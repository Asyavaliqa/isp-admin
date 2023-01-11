const micromatch = require('micromatch')

module.exports = {
  '*.php': (files) => {
    // from `files` filter those _NOT_ matching `*test.js`
    const match = micromatch.not(
        files, [
            '.history', '_ide_helper_models.php', '_ide_helper.php', '.phpstorm.meta.php'
        ])
    return `./vendor/bin/pint --config ./pint.json ${match.join(' ')}`
  },
}
