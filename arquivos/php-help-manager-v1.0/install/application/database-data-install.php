﻿<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/

$datatables = array(
    "config" => "
        INSERT INTO `".IN_DBPREF."config` (`config_name`, `config_value`) VALUES 
        ('session_id', 'user_helpdesk_id'),
        ('session_name', 'user_helpdesk_name'),
        ('charset', 'UTF-8'),
        ('dateformat', 'd M Y, h:i:s a'),
        ('sitekey', 'metakeys, separated,by themearabia.com'),
        ('sitedesc', 'Your website description goes here'),
        ('session_length', '3600'),
        ('acp_session_id', 'acp_megatplhelpdesk_id'),
        ('acp_session_name', 'acp_megatplhelpdesk_name'),
        ('description', 'A premium script  Knowledge Base '),
        ('lastactivity', '3600'),
        ('typeuploads', 'gif|png|jpg|jpeg|bmp'),
        ('gzip_compress', '1'),
        ('per_page', '9'),
        ('defaultcatnews', '1'),
        ('defaultcatarticle', '1'),
        ('permalink', 'numeric'),
        ('folderadmin', 'admin'),
        ('bg_color', '#ffffff'),
        ('bg_image', ''),
        ('bg_logo', ''),
        ('bg_favicon', ''),
        ('pageabout', ''),
        ('pageprivacy', ''),
        ('pagecontact', ''),
        ('themecolor', ''),
        ('facebook', '#'),
        ('twitter', '#'),
        ('googleplus', '#');
    ",
    
    "emailtemplates" => "INSERT INTO `".IN_DBPREF."emailtemplates` (`id`, `name`, `content`, `vars`) VALUES
        ('', 'header', '<blockquote class=\"ecxgmail_quote\" style=\"\">\r\n<div dir=\"rtl\">\r\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" style=\"color:#666666;background-color:#fafafa;border:1px solid #e7e7e7;border-collapse:collapse\">\r\n<tbody><tr>\r\n<td>\r\n<div style=\"padding:10px\"><div class=\"ecxim\">\r\n<table width=\"100%\" dir=\"ltr\" align=\"center\" style=\"border-collapse:collapse\" border=\"0\" cellpadding=\"0\">\r\n<tbody><tr>\r\n<td width=\"70%\"><span style=\"font-size:22pt;font-family:Tahoma,sans-serif;color:#666666\"> {$sitetitle} </span>\r\n<br />\r\n<p style=\"font-size:12pt;\">\r\n<a href=\"{$facebook}\">Facebook</a> | \r\n<a href=\"{$twitter}\">Twitter</a> | \r\n<a href=\"{$googleplus}\">Google+</a> | \r\n<a href=\"{$instagram}\">Instagram</a> \r\n</p>\r\n</td>\r\n<td width=\"30%\" style=\"font-size:8pt;color:#666666;text-align:right;\"> {$time}\r\n</td>\r\n</tr>\r\n</tbody></table>\r\n<hr color=\"#E7E7E7\" size=\"1\">\r\n</div>\r\n<div style=\"text-align:left;padding:10px 0 0px 0;color:#444444;font-family:Tahoma,Verdana,sans-serif;font-size:8pt\">\r\n', '{$sitetitle} {$siteemail} {$time} {$facebook} {$twitter} {$googleplus} {$instagram}'),
        ('', 'footer', '<br /><br />\r\n<div class=\"ecxim\">\r\n<hr color=\"#E7E7E7\" size=\"1\">\r\n<div style=\"font-family:Tahoma,Verdana,sans-serif;font-size:8pt;color:#666666;padding:10px 0px 0px 0;text-align:center;\">\r\n   \r\n<a href=\"{$facebook}\">Facebook</a> | \r\n<a href=\"{$twitter}\">Twitter</a> | \r\n<a href=\"{$googleplus}\">Google+</a> | \r\n<a href=\"{$instagram}\">Instagram</a> \r\n</div>\r\n</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p style=\"text-align: center;\">Please do not reply to this message.</p>\r\n</blockquote>', '{$sitetitle} {$siteemail} {$time} {$facebook} {$twitter} {$googleplus} {$instagram}'),
        ('', 'contact', '<p style=\"text-align:left;\" dir=\"ltr\">Username: {$username}<br><br>\r\nEmail address: {$email}<br><br>\r\nSubject: {$subject}<br><br>\r\nMessage<br><br>{$message}\r\n</p>', '{$username} {$email} {$subject} {$message}'),
        ('', 'forget_password', '<p style=\"text-align:left\" dir=\"ltr\">Hello {$firstname}  {$lastname} ,\n<br>\n<br>\nBeen sent a request to change your password, you can do so by clicking on the following link:\n<br><br>\n{$siteurl}users.php?page=forget&key={$keyforget}&login={$username}\n<br><br><br>\nIf you do not send this request, please ignore this message.\n</p>', '{$firstname} {$lastname} {$username} {$email} {$userid} {$keyforget}'),
        ('', 'forget_password_sucess', '<p style=\"text-align:left\" dir=\"ltr\">Hello {$firstname}  {$lastname} ,\r\n<br>\r\n<br>\r\nchange your password\r\n<br><br>\r\n</p>', '{$firstname} {$lastname}'),
        ('', 'update_password', '<p style=\"text-align:left\" dir=\"ltr\">Hello {$firstname}  {$lastname} ,\r\n<br>\r\n<br>\r\nchange your The password.\r\n<br><br>\r\n</p>', '{$firstname} {$lastname}');
    ",
    
    
    "phrases" => "INSERT INTO `".IN_DBPREF."phrases` (`id`, `lang_iso`, `varname`, `text`) VALUES
        ('', 'en', 'lang', 'en'),
        ('', 'en', 'dir', 'ltr'),
        ('', 'en', 'dashboard', 'Dashboard'),
        ('', 'en', 'general_setting', 'General Setting'),
        ('', 'en', 'themes_setting', 'Themes Setting'),
        ('', 'en', 'manage_categorys', 'Manage Categorys'),
        ('', 'en', 'language_settings', 'Language Settings'),
        ('', 'en', 'manage_pages', 'Manage Pages'),
        ('', 'en', 'manage_article', 'Manage Article'),
        ('', 'en', 'manage_news', 'Manage News'),
        ('', 'en', 'manage_faq', 'Manage FAQ'),
        ('', 'en', 'default_items_category_article', 'Default Items Category Article'),
        ('', 'en', 'default_items_category_news', 'Default Items Category News'),
        ('', 'en', 'add_new_article', 'Add New Article'),
        ('', 'en', 'edit_article', 'Edit Article'),
        ('', 'en', 'news_items', 'news Items'),
        ('', 'en', 'faq_items', 'FAQ Items'),
        ('', 'en', 'add_new', 'Add New'),
        ('', 'en', 'action', 'Action'),
        ('', 'en', 'edit', 'Edit'),
        ('', 'en', 'delete', 'Delete'),
        ('', 'en', 'enable', 'Enable'),
        ('', 'en', 'disable', 'Disable'),
        ('', 'en', 'deactivate', 'Deactivate'),
        ('', 'en', 'activate', 'activate'),
        ('', 'en', 'make_default', 'Make Default'),
        ('', 'en', 'export', 'Export'),
        ('', 'en', 'edit_phrases', 'Edit Phrases'),
        ('', 'en', 'back', 'Back'),
        ('', 'en', 'reset', 'Reset'),
        ('', 'en', 'add', 'Add'),
        ('', 'en', 'update', 'Update'),
        ('', 'en', 'order', 'Order'),
        ('', 'en', 'items', 'Items'),
        ('', 'en', 'save', 'Save'),
        ('', 'en', 'upload', 'Upload'),
        ('', 'en', 'save_changes', 'Save Changes'),
        ('', 'en', 'view', 'View'),
        ('', 'en', 'e_mail', 'E-Mail'),
        ('', 'en', 'views', 'views'),
        ('', 'en', 'by', 'By'),
        ('', 'en', 'modified', 'Modified'),
        ('', 'en', 'categorys', 'Categorys'),
        ('', 'en', 'align1', 'left'),
        ('', 'en', 'align2', 'center'),
        ('', 'en', 'align3', 'right'),
        ('', 'en', 'posts', 'Posts'),
        ('', 'en', 'website_name', 'Website Name'),
        ('', 'en', 'tagline', 'Tagline'),
        ('', 'en', 'website_url', 'Website URL'),
        ('', 'en', 'website_email', 'Website Email'),
        ('', 'en', 'default_items_category', 'Default Items Category'),
        ('', 'en', 'items_per_page', 'Items Per Page'),
        ('', 'en', 'site_wide_meta_keywords', 'Site wide Meta Keywords'),
        ('', 'en', 'site_wide_meta_description', 'Site wide Meta Description'),
        ('', 'en', 'gzip_compress', 'GZIP Compress'),
        ('', 'en', 'facebook', 'Facebook'),
        ('', 'en', 'twitter', 'Twitter'),
        ('', 'en', 'google', 'Google+'),
        ('', 'en', 'profile', 'Profile'),
        ('', 'en', 'username', 'Username'),
        ('', 'en', 'new_password', 'New Password'),
        ('', 'en', 'confirm_password', 'Confirm Password'),
        ('', 'en', 'mgs_new_password', 'If you would like to change the password type a new one. Otherwise leave this blank.'),
        ('', 'en', 'welcome', 'Welcome'),
        ('', 'en', 'logout', 'Logout'),
        ('', 'en', 'password', 'Password'),
        ('', 'en', 'login', 'Login'),
        ('', 'en', 'login_admin', 'Login Admin'),
        ('', 'en', 'login_error', 'Error:Username or password entered were incorrect.'),
        ('', 'en', 'status', 'Status'),
        ('', 'en', 'favicon', 'Favicon'),
        ('', 'en', 'cover_background', 'Cover Background'),
        ('', 'en', 'cover_text_color', 'Cover Text Color'),
        ('', 'en', 'themes', 'Themes'),
        ('', 'en', 'category_items', 'Category Items'),
        ('', 'en', 'options', 'Options'),
        ('', 'en', 'as_default_language', 'as Default Language'),
        ('', 'en', 'add_new_phrase', 'Add New Phrase'),
        ('', 'en', 'phrase_code', 'Phrase Code'),
        ('', 'en', 'language', 'Language'),
        ('', 'en', 'phrase_text', 'Phrase Text'),
        ('', 'en', 'add_phrase', 'Add Phrase'),
        ('', 'en', 'info_add_newphrase', 'To display this text in your template , simple add this where you want to display your text'),
        ('', 'en', 'add_new_language', 'Add New Language'),
        ('', 'en', 'upload_file', 'Upload file'),
        ('', 'en', 'inf_upload_language', 'Browse Language File ( must be .xml format )'),
        ('', 'en', 'add_language', 'Add Language'),
        ('', 'en', 'editing', 'Editing'),
        ('', 'en', 'language_name', 'Language Name'),
        ('', 'en', 'language_code', 'Language Code'),
        ('', 'en', 'language_regex', 'Language Regex'),
        ('', 'en', 'phrase', 'Phrase'),
        ('', 'en', 'article_items', 'Article Items'),
        ('', 'en', 'email_address_is_required', 'Email Address is required.'),
        ('', 'en', 'title', 'Title'),
        ('', 'en', 'add_new_category', 'Add New Category'),
        ('', 'en', 'content', 'Content'),
        ('', 'en', 'name', 'Name'),
        ('', 'en', 'email_address', 'Email Address'),
        ('', 'en', 'make_sure_you_write_your_email_correctly', 'Make sure you write your email correctly.'),
        ('', 'en', 'this_field_is_required', 'This field is required'),
        ('', 'en', 'well_done', 'Well done!'),
        ('', 'en', 'theme_activated_successfully', 'theme activated successfully.'),
        ('', 'en', 'saved_successfully', 'Saved successfully.'),
        ('', 'en', 'edit_category', 'Edit category'),
        ('', 'en', 'enable_category_successfully', 'Enable category successfully.'),
        ('', 'en', 'disable_category_successfully', 'disable category successfully.'),
        ('', 'en', 'used_template', 'used template'),
        ('', 'en', 'no_result', 'No Result'),
        ('', 'en', 'pages', 'Pages'),
        ('', 'en', 'enable_post_successfully', 'Enable Post Successfully.'),
        ('', 'en', 'disable_post_successfully', 'Disable Post Successfully.'),
        ('', 'en', 'delete_post_successfully', 'Delete Post successfully.'),
        ('', 'en', 'home', 'Home'),
        ('', 'en', 'search', 'search'),
        ('', 'en', 'copyright', 'copyright © 2015 All Rights Reserved.'),
        ('', 'en', 'about_us', 'About us'),
        ('', 'en', 'contact', 'Contact'),
        ('', 'en', 'follow_us_on_twitter', 'Follow us on Twitter'),
        ('', 'en', 'follow_us_on_google', 'Follow us on Google+'),
        ('', 'en', 'follow_us_on_facebook', 'Follow us on Facebook'),
        ('', 'en', 'username_is_required', 'Username is required.'),
        ('', 'en', 'subject_is_required', 'Subject is required.'),
        ('', 'en', 'messege_is_required', 'Messege is required.'),
        ('', 'en', 'subject', 'Subject'),
        ('', 'en', 'message', 'Message'),
        ('', 'en', 'send_message', 'Send Message'),
        ('', 'en', 'send_your_message_has_been_successfully', 'Send your message has been successfully.'),
        ('', 'en', 'cencel', 'Cencel'),
        ('', 'en', 'no', 'No'),
        ('', 'en', 'yes', 'Yes'),
        ('', 'en', 'type', 'Type'),
        ('', 'en', 'category', 'Category'),
        ('', 'en', 'socials', 'Socials'),
        ('', 'en', 'news', 'News'),
        ('', 'en', 'faq', 'FAQ'),
        ('', 'en', 'knowledge_base', 'Knowledge Base'),
        ('', 'en', 'search_the_knowledge_base', 'search the Knowledge Base ...'),
        ('', 'en', 'toggle_navigation', 'Toggle navigation'),
        ('', 'en', 'frequently_asked_questions', 'Frequently Asked Questions'),
        ('', 'en', 'infocategorys', 'Categorys'),
        ('', 'en', 'articles', 'Articles'),
        ('', 'en', 'infoposts', 'Posts'),
        ('', 'en', 'popular_news', 'Popular News'),
        ('', 'en', 'popular_knowledge_base', 'Popular Knowledge Base'),
        ('', 'en', 'enter_username', 'Enter Username'),
        ('', 'en', 'enter_email_address', 'Enter Email address'),
        ('', 'en', 'enter_subject', 'Enter Subject'),
        ('', 'en', 'enter_message', 'Enter Message'),
        ('', 'en', 'privacy', 'privacy'),
        ('', 'en', 'publishnow', 'Publish Now'),
        ('', 'ar', 'lang', 'ar'),
        ('', 'ar', 'dir', 'rtl'),
        ('', 'ar', 'dashboard', 'الرئيسية'),
        ('', 'ar', 'general_setting', 'إعدادات عامة'),
        ('', 'ar', 'themes_setting', 'إعدادات القالب'),
        ('', 'ar', 'manage_categorys', 'إدارة الأقسام'),
        ('', 'ar', 'language_settings', 'إعدادات اللغة'),
        ('', 'ar', 'manage_pages', 'إدارة الصفحات'),
        ('', 'ar', 'manage_article', 'إدارة المقالات'),
        ('', 'ar', 'manage_news', 'إدارة الأخبار'),
        ('', 'ar', 'manage_faq', 'إدارة الأسئلة المكررة'),
        ('', 'ar', 'default_items_category_article', 'القسم الافتراضي للمقالات'),
        ('', 'ar', 'default_items_category_news', 'القسم الافتراضي للأخبار'),
        ('', 'ar', 'add_new_article', 'أضف مقال جديد'),
        ('', 'ar', 'edit_article', 'تعديل المقال'),
        ('', 'ar', 'news_items', 'عناصر الأخبار'),
        ('', 'ar', 'faq_items', 'عناصر الأسئلة المكررة'),
        ('', 'ar', 'add_new', 'أضف خبر'),
        ('', 'ar', 'action', 'الإجراءات'),
        ('', 'ar', 'edit', 'تعديل'),
        ('', 'ar', 'delete', 'حذف'),
        ('', 'ar', 'enable', 'تمكين'),
        ('', 'ar', 'disable', 'تعطيل'),
        ('', 'ar', 'deactivate', 'تعطيل'),
        ('', 'ar', 'activate', 'تفعيل'),
        ('', 'ar', 'make_default', 'افتراضي'),
        ('', 'ar', 'export', 'تصدير'),
        ('', 'ar', 'edit_phrases', 'تعديل العبارات'),
        ('', 'ar', 'back', 'عودة'),
        ('', 'ar', 'reset', 'اعادة'),
        ('', 'ar', 'add', 'أضف'),
        ('', 'ar', 'update', 'تحديث'),
        ('', 'ar', 'order', 'ترتيب'),
        ('', 'ar', 'items', 'العناصر'),
        ('', 'ar', 'save', 'حفظ'),
        ('', 'ar', 'upload', 'رفع'),
        ('', 'ar', 'save_changes', 'حفظ التغييرات'),
        ('', 'ar', 'view', 'مشاهدة'),
        ('', 'ar', 'e_mail', 'البريد'),
        ('', 'ar', 'views', 'مشاهدات'),
        ('', 'ar', 'by', 'بواسطة'),
        ('', 'ar', 'modified', 'تاريخ الإضافة'),
        ('', 'ar', 'categorys', 'الأقسام'),
        ('', 'ar', 'align1', 'right'),
        ('', 'ar', 'align2', 'center'),
        ('', 'ar', 'align3', 'left'),
        ('', 'ar', 'posts', 'منشورات'),
        ('', 'ar', 'website_name', 'اسم الموقع'),
        ('', 'ar', 'tagline', 'وصف الموقع'),
        ('', 'ar', 'website_url', 'رابط الموقع'),
        ('', 'ar', 'website_email', 'البريد الإلكتروني للموقع'),
        ('', 'ar', 'items_per_page', 'عدد العناصر في الصفحة'),
        ('', 'ar', 'site_wide_meta_keywords', 'الكلمات المفتاحية للبحث'),
        ('', 'ar', 'site_wide_meta_description', 'الكلمات الوصفية للبحث'),
        ('', 'ar', 'gzip_compress', 'GZIP Compress'),
        ('', 'ar', 'facebook', 'Facebook'),
        ('', 'ar', 'twitter', 'Twitter'),
        ('', 'ar', 'google', 'Google+'),
        ('', 'ar', 'profile', 'الملف الشخصي'),
        ('', 'ar', 'username', 'اسم المستخدم'),
        ('', 'ar', 'new_password', 'كلمة المرور الجديدة'),
        ('', 'ar', 'confirm_password', 'تأكيد كلمة المرور'),
        ('', 'ar', 'mgs_new_password', 'اذا كنت لا ترغب في تغيير كلمة المرور اترك الحقل فارغ.'),
        ('', 'ar', 'welcome', 'مرحبا'),
        ('', 'ar', 'logout', 'خروج'),
        ('', 'ar', 'password', 'كلمة المرور'),
        ('', 'ar', 'login', 'تسجيل الدخول'),
        ('', 'ar', 'login_admin', 'تسجيل دخول المدير'),
        ('', 'ar', 'login_error', 'خطأ: اسم المستخدم او كلمة المرور غير صحيحة'),
        ('', 'ar', 'status', 'الحالة'),
        ('', 'ar', 'favicon', 'Favicon'),
        ('', 'ar', 'cover_background', 'الغلاف'),
        ('', 'ar', 'cover_text_color', 'لون نص الغلاف'),
        ('', 'ar', 'themes', 'القوالب'),
        ('', 'ar', 'category_items', 'عناصر الاقسام'),
        ('', 'ar', 'options', 'الخيارات'),
        ('', 'ar', 'as_default_language', 'اللغة الافتراضية'),
        ('', 'ar', 'add_new_phrase', 'أضف عبارة جديدة'),
        ('', 'ar', 'phrase_code', 'كود العبارة'),
        ('', 'ar', 'language', 'اللغة'),
        ('', 'ar', 'phrase_text', 'نص العبارة'),
        ('', 'ar', 'add_phrase', 'أضف العبارة'),
        ('', 'ar', 'info_add_newphrase', 'يمكنك اضافة فهرس جديد لاستخدامة في القالب'),
        ('', 'ar', 'add_new_language', 'أضف لغة جديدة'),
        ('', 'ar', 'upload_file', 'رفع الملف'),
        ('', 'ar', 'inf_upload_language', 'يقبل رفع الملفات بامتداد (.xml)'),
        ('', 'ar', 'add_language', 'أضف اللغة'),
        ('', 'ar', 'editing', 'Editing'),
        ('', 'ar', 'language_name', 'اسم اللغة'),
        ('', 'ar', 'language_code', 'كود اللغة'),
        ('', 'ar', 'language_regex', 'Regex اللغة'),
        ('', 'ar', 'phrase', 'العبارات'),
        ('', 'ar', 'article_items', 'عناصر المقالات'),
        ('', 'ar', 'email_address_is_required', 'البريد الالكتروني مطلوب.'),
        ('', 'ar', 'title', 'العنوان'),
        ('', 'ar', 'add_new_category', 'أضف قسم جديد'),
        ('', 'ar', 'content', 'المحتوي'),
        ('', 'ar', 'name', 'الاسم'),
        ('', 'ar', 'no_result', 'عفوا لاتوجد نتائج.'),
        ('', 'ar', 'email_address', 'البريد الالكتروني'),
        ('', 'ar', 'make_sure_you_write_your_email_correctly', 'ادخل البريد الالكتروني بشكل صحيح.'),
        ('', 'ar', 'this_field_is_required', 'هذا الحقل مطلوب'),
        ('', 'ar', 'well_done', 'تم بالفعل!'),
        ('', 'ar', 'theme_activated_successfully', 'تم تفعيل القالب بنجاح.'),
        ('', 'ar', 'saved_successfully', 'تم الحفظ بنجاح.'),
        ('', 'ar', 'edit_category', 'تعديل القسم'),
        ('', 'ar', 'enable_category_successfully', 'تم تمكين القسم بنجاح.'),
        ('', 'ar', 'disable_category_successfully', 'تم تعطيل القسم بنجاح.'),
        ('', 'ar', 'used_template', 'القالب المستخدم'),
        ('', 'ar', 'pages', 'الصفحات'),
        ('', 'ar', 'enable_post_successfully', 'تم تمكين المنشور بنجاح.'),
        ('', 'ar', 'disable_post_successfully', 'تم تعطيل المنشور بنجاح.'),
        ('', 'ar', 'delete_post_successfully', 'تم حذف المنشور بنجاح.'),
        ('', 'ar', 'home', 'الرئيسية'),
        ('', 'ar', 'search', 'بحث'),
        ('', 'ar', 'copyright', 'جميع الحقوق محفوظة &copy; 2015'),
        ('', 'ar', 'about_us', 'من نحن'),
        ('', 'ar', 'contact', 'تواصل معنا'),
        ('', 'ar', 'follow_us_on_twitter', 'تابعنا علي تويتر'),
        ('', 'ar', 'follow_us_on_google', 'تابعنا علي جوجل بلس'),
        ('', 'ar', 'follow_us_on_facebook', 'تابعنا علي فيسبوك'),
        ('', 'ar', 'username_is_required', 'اسم المستخدم مطلوب.'),
        ('', 'ar', 'subject_is_required', 'العنوان مطلوب.'),
        ('', 'ar', 'messege_is_required', 'نص الرسالة مطلوب.'),
        ('', 'ar', 'subject', 'العنوان'),
        ('', 'ar', 'message', 'الرسالة'),
        ('', 'ar', 'send_message', 'ارسال الرسالة'),
        ('', 'ar', 'send_your_message_has_been_successfully', 'تم ارسال الرسالة بنجاح.'),
        ('', 'ar', 'cencel', 'إلغاء'),
        ('', 'ar', 'no', 'لا'),
        ('', 'ar', 'yes', 'نعم'),
        ('', 'ar', 'type', 'النوع'),
        ('', 'ar', 'category', 'الأقسام'),
        ('', 'ar', 'socials', 'مواقع التواصل'),
        ('', 'ar', 'news', 'الأخبار'),
        ('', 'ar', 'faq', 'الأسئلة المكررة'),
        ('', 'ar', 'knowledge_base', 'قاعدة المعرفة'),
        ('', 'ar', 'search_the_knowledge_base', 'ابحث في قاعدة المعرفة ...'),
        ('', 'ar', 'toggle_navigation', 'أظهار القائمة'),
        ('', 'ar', 'frequently_asked_questions', 'الأسئلة المكررة'),
        ('', 'ar', 'infocategorys', 'قسم'),
        ('', 'ar', 'articles', 'مقال'),
        ('', 'ar', 'infoposts', 'منشور'),
        ('', 'ar', 'popular_news', 'الأخبار الأكثر مشاهدة'),
        ('', 'ar', 'popular_knowledge_base', 'قواعد المعرفة الأكثر زيارة'),
        ('', 'ar', 'enter_username', 'أدخل اسم المستخدم'),
        ('', 'ar', 'enter_email_address', 'أدخل البريد الالكتروني'),
        ('', 'ar', 'enter_subject', 'أدخل العنوان'),
        ('', 'ar', 'enter_message', 'أدخل نص الرسالة'),
        ('', 'ar', 'privacy', 'سياسة الخصوصية'),
        ('', 'ar', 'publishnow', 'أنشر الأن');
    ",
    
    
);
?>