const fs = require("fs-extra")
const path = require("path")
const inquirer = require("inquirer")
const questions = require("../lib/questions")

const CURRENT_DIR = path.dirname(__dirname)

const createDirectoryContents = (sourceFilesPath, newProjectPath, datas) => {
	fs.copySync(sourceFilesPath, newProjectPath)

	// write style.css content
	let styleCSSContent = `
/*
Theme Name: ${datas.themeName}
Theme URI: ${datas.themeURI}
Author: ${datas.author}
Author URI: ${datas.authorURI}
Description: ${datas.description}
Version: ${datas.version}
License: ${datas.license}
License URI: ${datas.licenseURI}
Tags: ${datas.tags}
Text Domain: ${datas.textDomain}
Domain Path: ${datas.domainPath}
*/
`

	fs.writeFileSync(
		`${process.cwd()}/${newProjectPath}/style.css`,
		styleCSSContent
	)
}

const wptbQuestions = () => {
	return inquirer.prompt(questions.questions).then((answers) => {
		switch (answers.license) {
			case "ISC":
				answers.licenseURI = "https://opensource.org/licenses/ISC"
				break
			case "MIT":
				answers.licenseURI = "https://choosealicense.com/licenses/mit/"
				break
			default:
				answers.licenseURI = "https://choosealicense.com/licenses/gpl-3.0"
		}

		const choosenTemplate = answers.template
		const projectName = answers.themeName
		const templatePath = `${CURRENT_DIR}/templates/${choosenTemplate}`

		// create a the new project directory with theme name
		fs.mkdirSync(`${process.cwd()}/${projectName}`)

		console.log(
			JSON.stringify(answers, null, "  "),
			`=============================================
			🎉Your Theme have been successfully created✨
			==============================================`
		)
		createDirectoryContents(templatePath, projectName, answers)
	})
}

module.exports = { wptbQuestions }
