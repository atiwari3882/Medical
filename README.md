# README 

This README would normally document whatever steps are necessary to get your application up and running.

### Briefing about Nexium:-
Nexium supports multilingual. This project provides e-learning modules for assessments but before assesment module you have to login in as an user. 
Then you can answer questions after complete that process english user gets email and can download his certificate which generate after competing process.

### Passing criteria:-
 * Greater than 80% mark your assessment will complete and you can download certificate for that assessment.
 * If less than 80% mark then you will get "Retake the assessment" link

#### Modules:-
   Assessment modules are managing through courspress pro plugin which can never upgrade. Because few custom changes happend in plugin.

### List of plugins which will never upgrade:-
  * Courspress Pro
  ** *Note-* For now, we have 1000.2.2.9 (original was 1.2.2.9)
  * Pie register
  ** *Note-* For now, we have 2000.0.14 (original was 2.0.14)
  * qTranslate-X
  ** *Note-* For now, we have 3000.4.6.4 (original was 3.4.6.4)
  ** *Special note- IF anyone want to update to newer version then they have to follow small step so that user environment locale will not effect*
  *** Which is 3 line codes need to update after upgradation of plugin. 
  **** Update in qtranslate_core.php:64
  ***** <?php 
          	if (get_current_user_id()) {
        		$locale = get_user_meta(get_current_user_id(), 'pie_dropdown_3');
        		$url_info['language'] = !empty($locale[0]) ? $locale[0] : '';
        	}
        	?>
### Multilingual behaviour on user interface:-
 * Two languages(fr/en) are active for the moment.
 * When user register they choose preffered langauage and it impact on user locale.
 * After login interface will translate according to logged in user prefereed langage.
   
### qTranslate-X plugin can update but be carefull:-
  * In this plugin, there have hard code which reflect entire project so be carefull before update.
  * There have 3 lines code in file qtranslate_core.php:64
  
### Project technology used:-  
  * PHP & Mysql
  * Wordpress 4.3.1
  
  

