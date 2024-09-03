<?php

namespace refaltor\coppervanillamods\utils;

use refaltor\coppervanillamods\Main;

final class Utils
{

    public static function callDirectory(string $directory, callable $callable): void
    {
        $main = explode("\\", Main::getInstance()->getDescription()->getMain());
        unset($main[array_key_last($main)]);
        $main = implode("/", $main);
        $directory = rtrim(str_replace(DIRECTORY_SEPARATOR, "/", $directory), "/");
        $dir = Main::getInstance()->file . "src/$main/" . $directory;


        foreach (array_diff(scandir($dir), [".", ".."]) as $file) {
            $path = $dir . "/$file";
            $extension = pathinfo($path)["extension"] ?? null;

            if ($extension === null) {
                self::callDirectory($directory . "/" . $file, $callable);
            } elseif ($extension === "php") {
                $namespaceDirectory = str_replace("/", "\\", $directory);
                $namespaceMain = str_replace("/", "\\", $main);
                $namespace = $namespaceMain . "\\$namespaceDirectory\\" . basename($file, ".php");
                $callable($namespace);
            }
        }
    }
}