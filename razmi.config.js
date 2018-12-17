const fs = require('fs');
const readline = require('readline');

const readFile = readline.createInterface({
  input: fs.createReadStream('theme.env'),
  output: fs.createWriteStream('sass/_variables.global.scss'),
  terminal: false
});

readFile
  .on('line', transform)
  .on('close', function() {
    console.log(`UPDATED: "${this.output.path}"`);
  });

function transform(line) {
  let _var = line.split("=");
  this.output.write(`$${_var[0]}: ${_var[1]};\n`);
}

if (fs.existsSync('../../plugins/wprazmi/src')){
  const pluginFile = readline.createInterface({
    input: fs.createReadStream('theme.env'),
    output: fs.createWriteStream('../../plugins/wprazmi/src/_variables.global.scss'),
    terminal: false
  });
  pluginFile
  .on('line', transform)
  .on('close', function() {
    console.log('UPDATED: "${this.output.path}"')
  });
};