<?php

namespace Reach;

class Asset
{
    /**
     * Takes an asset path and returns the compiled asset path from the manifest.json.
     *
     * @param string $asset A path to an asset.
     * @return string The compiled asset path, or an empty string on failure.
     */
    public static function extract(string $asset): string
    {
        if (!file_exists(\Reach\Asset::path('manifest.json'))) {
            \Reach\Helpers::errorLog('manifest.json could not be found');
            return '';
        }

        $path_parts = explode('/', $asset);
        $manifest = \Reach\Asset::decodedContent('manifest.json');

        foreach ($path_parts as $part) {
            $manifest = $manifest[$part] ?? null;

            if (is_null($manifest)) {
                return '';
            }
        }

        // An empty manifest asset part value found.
        if (empty($manifest)) {
            return '';
        }

        return $manifest;
    }

    /**
     * Retrieves the content of the asset at the given path.
     *
     * @param string $asset A file path to an asset, relative to the theme root.
     * @return string The asset's content, or an empty string on failure.
     */
    public static function content(string $asset): string
    {
        $path = \Reach\Asset::path($asset);

        if (empty($path) || !file_exists($path)) {
            return '';
        }

        $contents = file_get_contents($path);

        if ($contents === false) {
            return '';
        }

        return trim($contents);
    }

    /**
     * Retrieves the json_decoded content of the asset at the given path.
     *
     * @param string $asset A file path to an asset, relative to the theme root.
     * @return array The asset's content as an associative array, or an empty array on failure.
     */
    public static function decodedContent(string $asset): array
    {
        $content = \Reach\Asset::content($asset);

        if (empty($content)) {
            return [];
        }

        return json_decode($content, true);
    }

    /**
     * Takes an uncompiled asset path and returns the full compiled theme path.
     *
     * @param string $asset A path to an asset.
     * @param bool $manifest Whether to use the manifest.json to return a versioned asset name.
     * @return string The full compiled theme asset path, or an empty string on failure.
     */
    public static function path(string $asset = '', bool $manifest = false): string
    {
        if ($manifest === true) {
            $asset = \Reach\Asset::extract($asset);
        }

        if (empty($asset)) {
            return '';
        }

        return \Reach\Paths::themeAssetPath($asset);
    }

    /**
     * Takes an uncompiled asset path and returns the full compiled theme URL.
     *
     * @param string $asset A path to an asset
     * @param bool $manifest Whether to use the manifest.json to return a versioned asset name.
     * @return string The full compiled theme asset URL, or an empty string on failure.
     */
    public static function URL(string $asset, bool $manifest = false): string
    {
        if ($manifest === true) {
            $asset = \Reach\Asset::extract($asset);
        }

        if (empty($asset)) {
            return '';
        }

        return \Reach\Paths::themeAssetURL($asset);
    }
}
