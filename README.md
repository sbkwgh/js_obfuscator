js_obfuscator
=============

A simple JavaScript code obfuscator, generated from PHP.

To use, just `require` the js_obfuscator.php file and run the `obfuscate()` function.

    require("js_obfuscator.php");
    //Replace "script.js" with the address of your JavaScript file
    obfuscate("script.js");

Features include, encoding the text in a random base, using random variable names, and having part of the "decryption key" to be the number of UTC minutes: meaning that it will only decode at the time of download.
