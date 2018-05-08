<?php

/*
Plugin Name: Category Checkbox Setting
Plugin URI:
Description: 親子関係のカテゴリーがある場合、チェックボックスの選択を連動させる。
Author: matsui
Version: 0.1
Author URI: 
*/

$category_checkbox_setting = new CategoryCheckboxSetting;
class CategoryCheckboxSetting
{
    public function __construct()
    {
	    $this->debug = true;
	    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
	    add_action( 'wp_terms_checklist_args', array($this, 'wp_terms_checklist_args'));
    }
    
    
    /**
	 * スクリプトの追加
	 */
	public function admin_enqueue_scripts()
	{
		$dir = 'dist';
		$min = '.min';
		if($this->debug == true){
			$dir = 'src';
			$min = '';
		}
		if(get_post_type() == 'post'){
			wp_enqueue_script( 'my_admin_script', get_template_directory_uri().'/'.$dir.'/js/add'.$min.'.js', array('jquery'), '', true);
			wp_enqueue_script('custom-script', plugins_url('/'.$dir.'/js/add'.$min.'.js', __FILE__ ), array( 'jquery' ), '', true);
		}
	}
	
	
	/**
	 * カテゴリの選択ボックス階層を維持
	 */
	public function wp_terms_checklist_args( $args, $post_id = null ) {
	    $args['checked_ontop'] = false;
	    return $args;
	}
}