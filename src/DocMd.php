<?php

/**
 * Copyright 2015 Rafal Zajac <rzajac@gmail.com>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
namespace Kicaj\DocMd;

use Kicaj\Tools\Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class generates markdown documentation.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class DocMd extends Command
{
    /**
     * The root path for the DocMd project.
     *
     * @var string
     */
    protected $docMdDir;

    /**
     * The path to templates directory.
     *
     * @var string
     */
    protected $tplDir;

    /**
     * The path where configure file was loaded from.
     *
     * @var string
     */
    protected $configDir;

    /**
     * The path to phpdocumentor binary.
     *
     * @var string
     */
    protected $phpDocBin;

    /**
     * The path to structure file.
     *
     * @var string
     */
    protected $structurePath;

    /**
     * Associative array of parsed classes.
     *
     * ['classFullName' => MdClass]
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Class index.
     *
     * @var array
     */
    protected $index = ['classes' => [], 'interfaces' => [], 'traits' => []];

    /**
     * DocMD configuration.
     *
     * @var array
     */
    protected $config = [
        // Path to temporary directory
        'tmp' => 'tmp',
        // Output path
        'doc' => 'doc',
        // The name of the project
        'project_name' => 'Unknown project',
    ];

    protected function configure()
    {
        $this->setName('generate')
             ->setDescription('Generate markdown documentation')
             ->addOption('config', 'c', InputOption::VALUE_OPTIONAL, 'The path to docmd.json. If not set it will search for docmd.json in current directory');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configPath = $input->getOption('config');

        if ($configPath === null) {
            $configPath = getcwd().'/docmd.json';
        }

        $this->configDir = realpath(dirname($configPath));

        if (!(file_exists($configPath) && is_readable($configPath))) {
            throw new Exception(sprintf('file %s is not readable', $configPath));
        }

        $this->config = array_merge($this->config, json_decode(file_get_contents($configPath), true));

        if ($this->config === null) {
            throw new Exception(sprintf('invalid %s - %s', $configPath, json_last_error_msg()));
        }

        $this->parseConfig();

        $structureFile = $this->getStructurePath();
        if (!is_file($structureFile)) {
            $this->generateStructure($output);
        }

        $output->writeln('generating documentation...');
        $this->generateDocs(Structure::make($structureFile, $this), $this->config['doc']);
    }

    protected function parseConfig()
    {
        $docDir = $this->getPath($this->config['doc']);
        if (!file_exists($docDir)) {
            if (!mkdir($docDir)) {
                throw new Exception(sprintf('could not create directory for docs: %s', $docDir));
            }
        } elseif (!is_writable($docDir)) {
            throw new Exception(sprintf('docs directory is not writable: %s', $docDir));
        }
        $this->config['doc'] = $docDir;

        $tmpDir = $this->getPath($this->config['tmp']);
        if (!file_exists($tmpDir)) {
            if (!mkdir($tmpDir)) {
                throw new Exception(sprintf('could not create temporary directory: %s', $tmpDir));
            }
        } elseif (!is_writable($tmpDir)) {
            throw new Exception(sprintf('tmp directory is not writable: %s', $tmpDir));
        }
        $this->config['tmp'] = $tmpDir;

        $srcDir = $this->getPath($this->config['src']);
        if (!is_dir($srcDir)) {
            throw new Exception(sprintf('source directory not found: %s', $srcDir));
        }
        $this->config['src'] = $srcDir;

        $this->checkPhpDocBin();
    }

    public function checkPhpDocBin()
    {
        $this->phpDocBin = $this->docMdDir.'/vendor/bin/phpdoc';
        $phpDocBinGlobal = $_SERVER['HOME'].'/.composer/vendor/bin/phpdoc';

        if (!is_executable($this->phpDocBin)) {
            if (!is_executable($phpDocBinGlobal)) {
                throw new Exception(sprintf('phpdocumentor not found in: [%s, %s]', $phpDocBinVendor, $phpDocBinGlobal));
            }
            $this->phpDocBin = $phpDocBinGlobal;
        }
    }

    protected function generateStructure(OutputInterface $output)
    {
        $output->writeln('generating structure.xml...');

        $phpDocOutPath = $this->config['tmp'].'/phpdoc';
        if (!is_dir($phpDocOutPath)) {
            if (!mkdir($phpDocOutPath)) {
                throw new Exception(sprintf('could not create phpdocumentor temporary directory: %s', $phpDocOutPath));
            }
        }

        $command = sprintf('%s -d %s -t %s --template="xml"', $this->phpDocBin, $this->config['src'], $phpDocOutPath);
        exec($command, $out, $ret);

        if ($ret != 0) {
            $output->writeln(implode("\n", $out));
            throw new Exception('phpdocumentor error');
        }
    }

    /**
     * Generate markdown documentation.
     *
     * @param Structure $structure  The structure
     * @param string    $outputPath The directory path where to put markdown documentation
     */
    protected function generateDocs(Structure $structure, $outputPath)
    {
        foreach ($structure->getFiles() as $file) {
            $class = $file->getClass();
            $classFullName = $class->getFullName();
            $this->classes[$classFullName] = $class;

            switch ($class->getClassType()) {
                case File::TYPE_CLASS:
                    $this->index['classes'][] = Tools::getFileLink($classFullName);
                    break;

                case File::TYPE_INTERFACE:
                    $this->index['interfaces'][] = Tools::getFileLink($classFullName);
                    break;

                case File::TYPE_TRAIT:
                    $this->index['traits'][] = Tools::getFileLink($classFullName);
                    break;
            }
        }

        $loader = new Twig_Loader_Filesystem($this->tplDir);
        $twig = new Twig_Environment($loader);

        foreach ($this->classes as $class) {
            $doc = $twig->render('class.txt', [
                'class' => $class,
            ]);

            file_put_contents($outputPath.DIRECTORY_SEPARATOR.$class->getMdFileName(), $doc);
        }

        $twig = new Twig_Environment($loader);

        $doc = $twig->render('index.txt', [
            'classes' => $this->index['classes'],
            'interfaces' => $this->index['interfaces'],
            'traits' => $this->index['traits'],
            'projectName' => $this->config['project_name'],
        ]);

        file_put_contents($outputPath.DIRECTORY_SEPARATOR.'index.md', $doc);
    }

    /**
     * Get class by full name.
     *
     * @param string $className The calss FQN
     *
     * @return MdClass|null
     */
    public function getClass($className)
    {
        if (isset($this->classes[$className])) {
            return $this->classes[$className];
        }

        return null;
    }

    /**
     * Get path from relative path.
     *
     * @param string $path The path relative to docmd.json file
     *
     * @return string
     */
    public function getPath($path)
    {
        if ($path[0] != '/') {
            $path = '/'.$path;
        }

        return $this->configDir.$path;
    }

    /**
     * Set DocMd project directory.
     *
     * @param string $projectDir
     *
     * @return DocMd
     */
    public function setDocMdDir($projectDir)
    {
        $this->docMdDir = $projectDir;
        $this->tplDir = $this->docMdDir.'/tpl';

        return $this;
    }

    /**
     * Return path to structure file.
     *
     * @return string
     */
    public function getStructurePath()
    {
        return $this->config['tmp'].'/phpdoc/structure.xml';
    }
}
