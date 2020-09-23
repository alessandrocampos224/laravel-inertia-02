<?php

if (!function_exists('_call')) {
    /**
     * Inertia helper.
     *
     * @param null|string $component
     * @param array       $props
     *
     * @return \Call\ResponseFactory|\Call\Response
     */
    function _call($component = null, $props = [])
    {
        $instance = \Call\Call::getFacadeRoot();

        if ($component) {
            return $instance->render($component, $props);
        }

        return $instance;
    }
}
