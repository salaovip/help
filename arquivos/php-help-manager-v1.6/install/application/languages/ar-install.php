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
//--------------------------------------------------------------------------------------------
// global
$lang['global']['lang']                             = 'ar';
$lang['global']['dir']                              = 'rtl';
$lang['global']['title']                            = '%s نظام التنصيب';
$lang['global']['description']                      = '(سيتم تنصيب الاسكربت في خلال ثواني)';
$lang['global']['status_step']                      = 'الحالة: تنصيب, الخطوة %s من 6';
$lang['global']['done_step']                        = 'الحالة: انتهي';
$lang['global']['start_message']                    = 'اضغط علي زر ابدء التنصيب لبدء التنصيب';
$lang['global']['show_details']                     = 'اظهار المعلومات';
$lang['global']['hide_details']                     = 'اخفاء المعلومات';
$lang['global']['begin_install']                    = 'ابدء التنصيب';
$lang['global']['install_progress']                 = 'شريط بيانات التنصيب';
$lang['global']['installing']                       = 'التنصيب';
$lang['global']['error']                            = 'خطأ';
$lang['global']['the_operation_did_not_succeed']    = 'Tلم يتم للاسف';
$lang['global']['has_been_successfully']            = 'تم بنجاح';
$lang['global']['create_table']                     = 'انشاء جدول:';
$lang['global']['check']                            = 'فحص';
//--------------------------------------------------------------------------------------------
// action required
$lang['actionrequired']['title']        = 'اجراء مطلوب';
$lang['actionrequired']['msg']          = 'تم الاتصال بالقاعدة بنجاح.<br />لبدء عملية التنصيب برجاء حذف جميع الجداول';
$lang['actionrequired']['yes']          = 'نعم';
$lang['actionrequired']['no']           = 'لا';
//--------------------------------------------------------------------------------------------
// reset database
$lang['resetdatabase']['title']         = 'تفريغ القاعدة';
$lang['resetdatabase']['msg1']          = 'وفيما يلي قائمة بأسماء جميع الجداول الموجودة في قاعدة البيانات الخاصة بك.';
$lang['resetdatabase']['msg2']          = 'سيتم حذف الجداول بشكل دائم وبشكل لا رجعة فيه حذف كافة الجداول المحدده ومحتوياتها من قاعدة البيانات عند النقر على زر حذف الجداول المحدده.';
$lang['resetdatabase']['selectall']     = 'تحديد / الغاء تحديد الكل';
$lang['resetdatabase']['deleteselect']  = 'حذف الجداول المحدده';
$lang['resetdatabase']['cancel']        = 'الغاء';
//--------------------------------------------------------------------------------------------
// step 1
$lang['step1']['title']                 = 'الخطوة 1 :  الاتصال بالسيرفر وتحديد قاعدة البيانات';
$lang['step1']['connect']               = 'تم الاتصال بالسيرفر بنجاح';
$lang['step1']['connect_error']         = 'من فضلك عدل ملف : [<strong>%s</strong>]';
$lang['step1']['selected']              = 'تم تحديد قاعدة البيانات بنجاح';
$lang['step1']['createddb']             = 'تم انشاء قاعدة البيانات بنجاح: [<strong>%s</strong>]';
$lang['step1']['createddb_error']       = 'خطاء في انشاء قاعدة البيانات: ';
//--------------------------------------------------------------------------------------------
// step 2
$lang['step2']['title']                 = 'الخطوة 2: التحقق من الدوال والمجلدات والملفات';
//--------------------------------------------------------------------------------------------
// step 3
$lang['step3']['title']                 = 'الخطوة 3 : انشاء الجداول';
//--------------------------------------------------------------------------------------------
// modal step3
$lang['modal-step3']['title']           = 'اعدادات عامة';
$lang['modal-step3']['sitename']        = 'اسم الموقع';
$lang['modal-step3']['siteurl']         = 'رابط الموقع';
$lang['modal-step3']['siteemail']       = 'البريد الالكتروني للموقع';
$lang['modal-step3']['submit']          = 'موافق';
//--------------------------------------------------------------------------------------------
// step 4
$lang['step4']['title']                 = 'الخطوة 4 : الاعدادات العامة';
$lang['step4']['insert']                = 'ادخال البيانات في جدول ';
$lang['step4']['importing']             = 'استيراد القيم الاساسية';
//--------------------------------------------------------------------------------------------
// modal step4
$lang['modal-step4']['title']           = 'بيانات مدير الموقع';
$lang['modal-step4']['adminname']       = 'اسم المدير';
$lang['modal-step4']['adminpassowrd']   = 'كلمة المرور للمدير';
$lang['modal-step4']['adminemail']      = 'البريد الالكتروني للمدير';
$lang['modal-step4']['submit']          = 'موافق';
//--------------------------------------------------------------------------------------------
// step 5
$lang['step5']['title']                 = 'الخطوة 5 : بيانات المدير';
//--------------------------------------------------------------------------------------------
// step 6
$lang['step6']['title']                 = 'الخطوة 6 :  ادخال البيانات الافتراضية';
$lang['step6']['importing']             = 'استيراد القيمة الافتراضية لجدول:';
//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------

?>