<?php

class Cache {
    protected $adapter;
    protected $memcachedServer;

    public function __construct()
    {
        $this->memcachedServer = '127.0.0.1';

        $this->adapter = new Memcached();
        $this->adapter->addServer($this->memcachedServer, 11211);
    }

    public function get($key)
    {
        return $this->adapter->get($key);
    }

    public function has($key)
    {
        if (is_array($this->adapter->get($key)) && count($this->adapter->get($key))) {
            return true;
        }

        return false;
    }

    public function set($key, $value)
    {
        $this->adapter->set($key, $value);
    }

    public function delete($key)
    {
        $this->adapter->delete($key);
    }

    public function keys()
    {
        return $this->adapter->getAllKeys();
    }
}
