<?php

use Illuminate\Contracts\Routing\UrlGenerator;

if (!function_exists('locale_url')) {
    /**
     * Generate an url for the application.
     *
     * @param string|null $path
     * @param null|array $parameters
     * @param bool|null $secure
     * @return UrlGenerator|string
     */
    function locale_url(string $path = null, $parameters = [], bool $secure = null)
    {
        return url(app()->getLocale() . $path, $parameters, $secure);
    }
}

if (!function_exists('locale_route')) {
    /**
     * Generate the URL to a named route.
     *
     * @param array|string $name
     * @param null|array $parameters
     * @param bool $absolute
     * @return string
     */
    function locale_route($name, $parameters = [], bool $absolute = true): string
    {
        if (!isset($parameters['locale'])) {
            $parameters['locale'] = app()->getLocale();
        }
        return route($name, $parameters, $absolute);
    }
}
