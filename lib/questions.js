const fs = require("fs")
const path = require("path")
const CHOICES = fs.readdirSync(`${path.dirname(__dirname)}/templates`)

let questions = [
	{
		name: "themeName",
		type: "input",
		message: "Enter your theme name:"
	},
	{
		name: "themeURI",
		type: "input",
		message: "Enter your theme URI(https://themeuri.com/):"
	},
	{
		name: "author",
		type: "input",
		message: "Enter the author name:"
	},
	{
		name: "authorURI",
		type: "input",
		message: "Enter your author URI(https://iamkael.io):"
	},
	{
		name: "descirption",
		type: "input",
		message: "A short description of the theme:"
	},
	{
		name: "version",
		type: "input",
		message: "The version, written in X.X or X.X.X format:"
	},
	{
		name: "tags",
		type: "input",
		message: 'Enter the theme keywords(separate by ","):'
	},
	{
		name: "textDomain",
		type: "input",
		message: "The string used for textdomain for translation:"
	},
	{
		name: "domainPath",
		type: "input",
		message: "Where to find the translation when the theme is disabled:"
	},
	{
		name: "license",
		type: "list",
		message: "The license of the theme:",
		choices: ["GNU", "MIT", "ISC"]
		// if choice, then automatically add license URI
	},
	{
		name: "template",
		type: "list",
		message: "Choisissez votre template:",
		choices: CHOICES
	}
]

module.exports = { questions }
