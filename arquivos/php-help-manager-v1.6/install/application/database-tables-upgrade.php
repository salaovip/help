<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
/*

*/
$datatables = array(
    
    "admin" => "ALTER TABLE  `".IN_DBPREF."admin` ADD `gid` TINYINT(3) NOT NULL AFTER `id`,  ADD `isadmin` TINYINT(1) NOT NULL AFTER `gid`;", 
    
    "adminupdate" => "UPDATE `".IN_DBPREF."admin` SET `isadmin`='1';", 
    
    "groups" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."groups` (
              `id` tinyint(3) NOT NULL auto_increment,
              `name` varchar(100) NOT NULL,
              `dashboard` tinyint(1) NOT NULL,
              `catearticle` tinyint(1) NOT NULL,
              `article` tinyint(1) NOT NULL,
              `catenews` tinyint(1) NOT NULL,
              `news` tinyint(1) NOT NULL,
              `faq` tinyint(1) NOT NULL,
              `pages` tinyint(1) NOT NULL,
              `setting` tinyint(1) NOT NULL,
              `themes` tinyint(1) NOT NULL,
              `language` tinyint(1) NOT NULL,
          PRIMARY KEY  (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
    ",  
    
    "phrases" => "INSERT INTO `".IN_DBPREF."phrases` (`id`, `lang_iso`, `varname`, `text`) VALUES
        ('', 'en', 'manage_users', 'Manage Users'),
        ('', 'en', 'manage_groups', 'Manage Groups'),
        ('', 'en', 'users', 'users'),
        ('', 'en', 'add_group', 'Add Group'),
        ('', 'en', 'edit_groups', 'Edit Groups'),
        ('', 'en', 'add_new_group', 'Add New Group'),
        ('', 'en', 'disable_groups_successfully', 'disable groups successfully'),
        ('', 'en', 'enable_groups_successfully', 'enable groups successfully'),
        ('', 'en', 'delete_groups_successfully', 'delete groups successfully'),
        ('', 'en', 'manage_categorys_article', 'Manage Categorys Article'),
        ('', 'en', 'manage_categorys_news', 'Manage Categorys News'),
        ('', 'en', 'group', 'Group'),
        ('', 'en', 'add_user', 'Add User'),
        ('', 'en', 'isadmin', 'Admin'),
        ('', 'en', 'edit_users', 'Edit Users'),
        ('', 'en', 'add_new_users', 'Add New Users'),
        ('', 'en', 'disable_users_successfully', 'disable users successfully'),
        ('', 'en', 'enable_users_successfully', 'enable users successfully'),
        ('', 'en', 'delete_users_successfully', 'delete users successfully'),
        ('', 'en', 'error_permission', 'error permission'),
        ('', 'en', 'nof_nopermission', 'Error Permission'),
        ('', 'ar', 'manage_users', 'إدارة الاعضاء'),
        ('', 'ar', 'manage_groups', 'إدارة المجموعات'),
        ('', 'ar', 'users', 'الاعضاء'),
        ('', 'ar', 'add_group', 'أضف مجموعة'),
        ('', 'ar', 'edit_groups', 'تعديل مجموعة'),
        ('', 'ar', 'add_new_group', 'أضافة مجموعة جديدة'),
        ('', 'ar', 'disable_groups_successfully', 'تم تعطيل المجموعة بنجاح'),
        ('', 'ar', 'enable_groups_successfully', 'تم تفعيل المجموعة بنجاح'),
        ('', 'ar', 'delete_groups_successfully', 'تم حذف المجموعة بنجاح'),
        ('', 'ar', 'manage_categorys_news', 'إدارة اقسام الأخبار'),
        ('', 'ar', 'manage_categorys_article', 'إدارة اقسام المقالات'),
        ('', 'ar', 'group', 'المجموعة'),
        ('', 'ar', 'add_user', 'أضف عضو جديد'),
        ('', 'ar', 'isadmin', 'مدير'),
        ('', 'ar', 'edit_users', 'تعديل عضو'),
        ('', 'ar', 'add_new_users', 'أضافة عضو جديد'),
        ('', 'ar', 'disable_users_successfully', 'تم تعطيل العضو بنجاح'),
        ('', 'ar', 'enable_users_successfully', 'تم تفعيل العضو بنجاح'),
        ('', 'ar', 'delete_users_successfully', 'تم حذف العضو بنجاح'),
        ('', 'ar', 'error_permission', 'تصريح خطاء'),
        ('', 'ar', 'nof_nopermission', 'ليس لديك صلاحية لدخول هذة الصفحة');
    ",
);
?>