#!/usr/bin/env node

// NPM packages require
const chalk = require("chalk")
const clear = require("clear")
const figlet = require("figlet")

// Files require
const inquirer = require("./lib/inquirer")

// Start the main functions of the app
clear()
console.log(
	chalk.blue(
		figlet.textSync("WPTB", {
			font: "Standard",
			horizontalLayout: "default",
			kerning: "fitted"
		})
	)
)

inquirer.wptbQuestions()
