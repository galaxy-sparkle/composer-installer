<?php

namespace GalaxySparkle\ComposerInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * Paths array.
     *
     * @var array
     */
    protected $paths = [
        'base' => '/../../../..', 'resources' => '/../../../../resources',
    ];

    /**
     * Returns the path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getPath($path): string
    {
        return __DIR__.$this->paths[$path];
    }

    /**
     * {@inheritdoc}
     */
    public function getInstallPath(PackageInterface $package): string
    {
        $basePath = $this->getPath('base');

        return $basePath.'/plugins/'.$package->getPrettyName();
    }

    /**
     * {@inheritdoc}
     */
    public function getPackageBasePath(PackageInterface $package): string
    {
        return $this->getInstallPath($package);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($packageType): bool
    {
        return $packageType === 'galaxy-sparkle-plugin';
    }
}