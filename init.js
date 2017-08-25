const replace = require('replace'),
    slugify = require ('slugify'),
    prompt = require('prompt');

prompt.start();

prompt.get(['Theme_Name', 'Theme_URI', 'Author', 'Author_URI', 'Description', 'License', 'License_URI', 'Text_Domain'], function (err, result) {
   let themeName = result.Theme_Name,
       themeURI = result.Theme_URI,
       author = result.Author,
       authorURI = result.Author_URI,
       description = result.Description,
       license = result.License,
       licenseURI = result.License_URI,
       textdomain = result.Text_Domain;

   if( themeName != undefined ){
     replace({
       regex: 'Theme Name:',
       replacement: 'Theme Name: '+themeName,
       paths: [
         './style.css'
       ],
       silent: true,
     });

     // make it a slug for the gulpfile theme name
     const themeName_slug = slugify(themeName, {lower: true});

     replace({
       regex: 'your-theme-name',
       replacement: themeName_slug,
       paths: [
         './gulpfile.js'
       ],
       silent: true,
     });
   }

   if( themeURI != undefined ){
     replace({
       regex: 'Theme URI:',
       replacement: 'Theme URI: '+themeURI,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( author != undefined ){
     replace({
       regex: 'Author:',
       replacement: 'Author: '+author,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( authorURI != undefined ){
     replace({
       regex: 'Author URI:',
       replacement: 'Author URI: '+authorURI,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( description != undefined ){
     replace({
       regex: 'Description:',
       replacement: 'Description: '+description,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( license != undefined ){
     replace({
       regex: 'License:',
       replacement: 'License: '+license,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( licenseURI != undefined ){
     replace({
       regex: 'License URI:',
       replacement: 'License URI: '+licenseURI,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

   if( textdomain != undefined ){
     replace({
       regex: 'Text Domain:',
       replacement: 'Text Domain: '+textdomain,
       paths: [
         './style.css'
       ],
       silent: true,
     });
   }

 });
