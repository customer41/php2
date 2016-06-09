<?php

namespace App\Classes;

class View
    implements \Iterator, \ArrayAccess
{
    use ActProp;

    const PATH = __DIR__ . '/../views/';

    public function render($template) {
        foreach($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include View::PATH . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template) {
        echo $this->render($template);
    }

    public function fill($data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function current() {
        return current($this->data);
    }

    public function next() {
        next($this->data);
    }

    public function key() {
        return key($this->data);
    }

    public function valid() {
        return isset($this->data[$this->key()]);
    }

    public function rewind() {
        reset($this->data);
    }

    public function offsetExists($offset) {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->data[$offset]);
    }
}