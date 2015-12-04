# README #

This README would normally document whatever steps are necessary to get your application up and running.

### Description od Nexium ###
Nexium supports multilingual. This project provides e-learning modules for assessments but before assesment module you have to login in as an user. 
Then you can answer questions after complete that process english user gets email and can download his certificate which generate after competing process.

# Passing criteria - #
 > Greater than 80% mark your assessment will complete and you can download certificate for that assessment.
 > If less than 80% mark then you will get "Retake the assessment" link

# Modules - #
   Assessment modules are managing through courspress pro plugin which can never upgrade. Because few custom changes happend in plugin.

### List of plugins which will never upgrade ###
  > Courspress Pro
  > Pie register

### Multilingual behaviour on user interface ###
 > When user register they choose preffered langauage and it impact on user locale.
 > After login interface will translate according to logged in user prefereed langage.
   
### qTranslate-X plugin can be update but be carefull ###
  > In this plugin, there have hard code which reflect entire project so be carefull before update.
  > There have 3 lines code in qtranslate_core.php:64

