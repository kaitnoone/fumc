/*
 * Prelude Move Files Script
 *
 * DO NOT EDIT THIS FILE IF YOU DO NOT KNOW WHAT YOU ARE DOING!
 * This file is only intended for initial setup of Prelude and does not directly
 * modify the WordPress theme at all. If you are looking for theme JavaScript
 * please look in assets/js.
 *
 * This script may not work on all operating systems and may produce errors in
 * unsupported OS's.
 */

const prompt = require('prompt'),
      colors = require('colors'),
      { exec } = require('child_process');

prompt.start();

const promptTextMove = 'Attempt to move prelude files into project directory? Y/N (Note this may not work on all OS)';

prompt.get([promptTextMove, promptTextInit], (err, result) => {
  let userInputMove = result[promptTextMove],
      userInputInit = result[promptTextInit];

  const getResponse = () => {
    if( userInputMove === 'Y' || userInputMove === 'y' || userInputMove === 'yes' ) {
      console.log('You answered yes... Attempting move.'.green);

      exec('rsync -a -v --ignore-existing ./gulpfile.js ./../../ && rsync -a -v --ignore-existing ./ ./../../',(err, stdout, stderr) => {
        if(err) {
          console.error('There was an error moving the files. Please try manually.');
          return;
        }

        if( stdout ) {
          console.log(stdout);
        }

        if( stderr ){
          console.log(stderr);
        }

      });

    } else if (userInputMove === 'N' || userInputMove === 'n' || userInputMove === 'no') {
      console.log('No move attempted... Happy Pressing!.'.green);
    }
  }

  getResponse();

});
