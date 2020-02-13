Pages [![Circle CI](https://circleci.com/gh/revoxltd/pages.svg?style=svg&circle-token=eae1dbcf235c33884278791d7c44162153425ca6)](https://circleci.com/gh/revoxltd/pages)
=====
## A Novelty Among UI Frameworks

Our long standing vision has been to bypass the usual admin dashboard structure, and move forward with a
more sophisticated yet simple framework that would create a credible impact on the many conventional dashboard users.

## What's unique?

#### Navigation menu: Only when you need it.

Most dashboards have a huge menu next to it's content, which consumes a significant amount of space, effecting the UX negatively. We came up with a quick menu navigation, that is hidden and only comes when you need it

#### Menu clipping: Easier to remember & access

Menu clipping makes it easier to keep track of the page you are at & helps you to identify menu labels using abbreviations.

#### Quick Search: A keyboard press is all it takes. 

Search whatever you wish for with just a keyboard press anywhere on the screen.

#### Designed for a great experience!

Crafted specially, giving attention to detail, this is a celebration of creativity with guaranteed smoothness in UI/UX

## Getting started

It's required that you clone/copy this repo into a folder of your localhost for the Email, Charts and Maps pages to work since they utilize AJAX. 

### Requirements

- [Node.JS](http://nodejs.org/)
- [GruntJS](http://gruntjs.com/)

### *Open Sesame!*

Once you have the requirements set up, run ```npm install``` to start the build process

Then use the following grunt tasks to automate

### ```grunt build```

Quick build of Pages distribution

### ```grunt``` or ```grunt dist```

This will automatically compile the LESS files, minify your assets resources like css and js and bundle them together in a new directory called ```dist```.             This folder contains all the core files of the Pages framework.

### ```grunt demo```

Runs ```grunt dist``` and copies ```demo``` and ```plugins``` into ```bundle/demo```

### ```grunt barebone```
Runs ```grunt dist``` and copies ```barebone``` and ```plugins``` into ```bundle/getting_started```

### ```grunt bundle```

Runs all the steps above and copies grunt/gulp build config files into the ```bundle``` folder. Finally it will
              create a zip file (```bundle.zip```) in the same folder 

### ```grunt watch```
          
This will automatically compile the pages LESS files (default and other themes) on save

### ```grunt less```

This will compile the pages LESS files (default and other themes) on request

### ```grunt scss```

This will compile the pages SCSS files (default and other themes) on request

### Test it out!

[http://localhost/your/path/to/pages/bundle/demo/](http://localhost/your/path/to/pages/bundle/demo/)

### SCSS support

By default, all the above commands compile LESS to CSS. If you want to enable SCSS please append ```--cssPreprocessor=scss``` when running grunt. These SCSS files are found inside ```core/scss``` folder

