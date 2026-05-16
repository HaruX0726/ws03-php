<?php

/**
 * Get the base path
 * 
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view partial
 *
 * @param string $partial
 * @param array $data
 * @return void
 */
function loadPartial($partial, array $data = [])
{
    $partialPath = basePath('App/views/partials/' . $partial . '.php');

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial {$partial} not found";
    }
}

function loadView($name, $data = [])
{
    $viewPath = basePath('App/views/' . $name . '.view.php');

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found";
    }
}

function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}

/**
 * Inspect / dump a variable for debugging
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo '<pre style="background:#1a3044;color:#c9dff0;padding:16px;border:1px solid rgba(68,129,186,0.4);border-radius:8px;font-size:13px;overflow:auto;margin:16px;">';
    var_dump($value);
    echo '</pre>';
}

/**
 * Sanitize Data 
 * 
 * @param string $dirty
 * @return string
 */
function sanitize($dirty) {
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS
);
}

/**
 * Redirect to a given url
 * 
 * @param string $url
 * @return void
 */
function redirect($url) {
    header("Location: {$url}");
    exit;
}