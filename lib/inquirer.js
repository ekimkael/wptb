const fs = require("fs")
const inquirer = require("inquirer")
const questions = require("../lib/questions")

const CURRENT_DIR = process.cwd()

const createDirectoryContents = (templatePath, newProjectPath, datas) => {
	const fileToCreate = fs.readdirSync(templatePath)

	fileToCreate.forEach(file => {
		const originalFilePath = `${templatePath}/${file}`
		// get stats about the current file
		const stats = fs.statSync(originalFilePath)

		if (stats.isFile()) {
			const contents = fs.readFileSync(originalFilePath, "utf8")

			const writePath = `${CURRENT_DIR}/${newProjectPath}/${file}`
			fs.writeFileSync(writePath, contents, "utf8")
		} else if (stats.isDirectory()) {
			fs.mkdirSync(`${CURRENT_DIR}/${newProjectPath}/${file}`)

			// recursive call
			createDirectoryContents(
				`${templatePath}/${file}`,
				`${newProjectPath}/${file}`
			)
		}

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
			`${CURRENT_DIR}/${newProjectPath}/style.css`,
			styleCSSContent
		)
	})
}

const wptbQuestions = () => {
	return inquirer.prompt(questions.questions).then(answers => {
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
		const projectName = answers.themeName.replace(/ /gi, "")
		const templatePath = `${CURRENT_DIR}/templates/${choosenTemplate}`

		// create a the new project directory with theme name
		fs.mkdirSync(`${CURRENT_DIR}/${projectName}`)

		console.log(JSON.stringify(answers, null, "  "))
		createDirectoryContents(templatePath, projectName, answers)
	})
}

module.exports = { wptbQuestions }
