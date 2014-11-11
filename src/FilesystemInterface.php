<?php

namespace League\Flysystem;

interface FilesystemInterface
{
    /**
     * Check whether a file exists
     *
     * @param   string  $path
     * @return  bool
     */
    public function has($path);

    /**
     * Read a file
     *
     * @param   string  $path
     * @return  false|string
     */
    public function read($path);

    /**
     * Read a file as a stream
     *
     * @param   string  $path
     * @return  false|resource
     */
    public function readStream($path);

    /**
     * List contents of a directory
     *
     * @param   string  $directory
     * @param   bool    $recursive
     * @return  array
     */
    public function listContents($directory = '', $recursive = false);

    /**
     * Get all the meta data of a file or directory
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getMetadata($path);

    /**
     * Get all the meta data of a file or directory
     *
     * @param   string  $path
     * @return  false|integer
     */
    public function getSize($path);

    /**
     * Get the mime-type of a file
     *
     * @param   string  $path
     * @return  false|string
     */
    public function getMimetype($path);

    /**
     * Get the timestamp of a file
     *
     * @param   string  $path
     * @return  false|integer
     */
    public function getTimestamp($path);

    /**
     * Get the visibility of a file
     *
     * @param   string  $path
     * @return  false|string
     */
    public function getVisibility($path);

    /**
     * Write a new file
     *
     * @param   string       $path
     * @param   string       $contents
     * @param   array        $config   Config object or visibility setting
     * @return  boolean      success boolean
     */
    public function write($path, $contents, array $config = []);

    /**
     * Write a new file using a stream
     *
     * @param   string       $path
     * @param   resource     $resource
     * @param   array        $config   config array
     * @return  boolean      false on failure file meta data on success
     */
    public function writeStream($path, $resource, array $config = []);

    /**
     * Update a file
     *
     * @param   string       $path
     * @param   string       $contents
     * @param   array        $config   config array
     * @return  false|array  false on failure file meta data on success
     */
    public function update($path, $contents, array $config = []);

    /**
     * Update a file using a stream
     *
     * @param   string       $path
     * @param   resource     $resource
     * @param   array        $config   config array
     * @return  false|array  false on failure file meta data on success
     */
    public function updateStream($path, $resource, array $config = []);

    /**
     * Rename a file
     *
     * @param   string  $path
     * @param   string  $newPath
     * @return  boolean
     */
    public function rename($path, $newpath);

    /**
     * Copy a file
     *
     * @param   string  $path
     * @param   string  $newpath
     * @return  boolean
     */
    public function copy($path, $newpath);

    /**
     * Delete a file
     *
     * @param   string  $path
     * @return  boolean
     */
    public function delete($path);

    /**
     * Delete a directory
     *
     * @param   string  $dirname
     * @return  boolean
     */
    public function deleteDir($dirname);

    /**
     * Create a directory
     *
     * @param   string  $dirname directory name
     * @param   array   $config
     *
     * @return  bool
     */
    public function createDir($dirname, array $config = []);

    /**
     * Set the visibility for a file
     *
     * @param   string    $path
     * @param   string    $visibility
     * @return  boolean   success boolean
     */
    public function setVisibility($path, $visibility);

    /**
     * Create a file or update if exists
     *
     * @param  string              $path     path to file
     * @param  string              $contents file contents
     * @param  array               $config
     * @throws FileExistsException
     * @return boolean             success boolean
     */
    public function put($path, $contents, array $config = []);

    /**
     * Create a file or update if exists using a stream
     *
     * @param   string    $path
     * @param   resource  $resource
     * @param   array     $config
     * @return  boolean   success boolean
     */
    public function putStream($path, $resource, array $config = []);

    /**
     * Read and delete a file.
     *
     * @param   string  $path
     * @return  string  file contents
     * @throws  FileNotFoundException
     */
    public function readAndDelete($path);

    /**
     * List all files in the directory
     *
     * @param string      $directory
     * @param bool        $recursive
     *
     * @return array
     */
    public function listFiles($directory = '', $recursive = false);

    /**
     * List all paths
     *
     * @param   string  $directory
     * @param   bool    $recursive
     * @return  array   paths
     */
    public function listPaths($directory = '', $recursive = false);

    /**
     * List contents with metadata
     *
     * @param   array   $keys metadata key
     * @param   string  $directory
     * @param   bool    $recursive
     * @return  array            listing with metadata
     */
    public function listWith(array $keys = array(), $directory = '', $recursive = false);

    /**
     * Get metadata for an object with required metadata
     *
     * @param   string  $path      path to file
     * @param   array   $metadata  metadata keys
     * @throws  InvalidArgumentException
     * @return  array   metadata
     */
    public function getWithMetadata($path, array $metadata);

    /**
     * Get a file/directory handler
     *
     * @param   string   $path
     * @param   Handler  $handler
     * @return  Handler  file or directory handler
     */
    public function get($path, Handler $handler = null);

    /**
     * Flush the cache
     *
     * @return  $this
     */
    public function flushCache();

    /**
     * Register a plugin
     *
     * @param   PluginInterface  $plugin
     * @return  $this
     */
    public function addPlugin(PluginInterface $plugin);
}
