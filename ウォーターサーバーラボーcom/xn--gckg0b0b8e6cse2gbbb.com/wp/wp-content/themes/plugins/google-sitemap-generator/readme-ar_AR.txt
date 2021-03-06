=== صانع خريطة الموقع لبرنامج ووردبريس ===


المطورون: Arne, Michael, Rodney, Hirosama, James, John, Brad, Christian
ترجمة: سوار - http://www.sewar.be/wordpress/plugins/sitemap/

هذه الأداة ستشئ خريطة لموقعك متوافقة مع محرك البحث google لمدونة ووردبريس الخاصة بك. حالياً يتم إضافة الصفحة الرئيسية, التدوينات, الصفحات, التصنيفات و الأرشيف إلى الخريطة آلياً. أفضلية التدوينة تعتمد على عدد التعليقات عليها. تعليقات أكثر, أفضلية أعلى! إذا كان لديك صفحات خارجية لا تنتمي إلى مدونتك, تستطيع أيضاً إضافتهم إلى الخريطة. هذه الأداة ستخبر Google تلقائياً عندما يتم إعادة إنشاء خريطة الموقع.

== التثبيت ==

1. ارفع المجلد بالكامل إلى مجلد wp-content/plugins في موقعك، يكفي رفع الملفات التالية: sitemap.php و sitemap-ar.mo لكي تعمل الإضافة باللغة العربية.
2. إجعل مجلد مدونتك الرئيسي قابل للكتابة أو إنشأ ملفين و سمهم: sitemap.xml و sitemap.xml.gz و أجعلهم قابلين للكتابة.
2. فعل الإضافة من لوحة تحكم مدونتك.
3. حرر أو إنشر تدوينة أو إضغط على زر "إعادة إنشاء خريطة الموقع" في إعدادات خريطة الموقع.

== الأسئلة المتكررة == 

= لا يوجد في مدونتي تعليقات (أو قمت بإلغائهم) و جميع تدويناتي لديها الأفضلية صفر! =
قم بتعطل حساب الأفضلية الآلية و حدد أفضلية ثابتة للتدوينات!

= هل يجب علي دائماً الضغط على زر "إعادة إنشاء خريطة الموقع" إذا قمت بتعديل تدوينة? =
A: لا! إذا قمت بتحرير أو نشر أو حذف تدوينة, سيتم إعادة إنشاء خريطة موقعك تلقائياً!

= الإعدادات كثيرة جداً … هل يجب عليّ تغييرهم كلهم? =
A: لا! فقط إذا أردت ذلك. الإعدادات الإفتراضية مناسبة!

= ما هي الإصدارات التي تعمل عليها هذه الإضافة في ووردبريس? =
A: هذه الإضافة تعمل على الإصدارة 1.5.1.1 و الإصدارات الأحدث بما في ذلك الإصدارة 2.0. بعض المستخدمين حصلت لهم مشاكل في الإصدارة 1.5. يجب أن تحدث مدونتك إلى آخر إصدار من برنامج ووردبريس لأنه يتضمن أيضاً على إغلاق ثغرات خطيرة.

= ظهرت لي رسالة خطأ "fopen error" و / أو "permission denied" =
A: إذا ظهرت لك أخطاء في الصلاحيات تأكد من إعدادات خريطة الموقع في لوحة التحكم. حاول أن تنشئ ملفين باسم sitemap.xml و sitemap.xml.gz يدوياً ثم أرفعهم إلى موقعك و غير الصلاحيات "CHMOD" إلى 666. ثم أعد إنشاء خارطة الموقع من لوحة التحكم. يوجد درس رائع لطريقة تغيير صلاحيات ملف تستطيع إيجاده في ووردبريس كوديكس.

= ما هي إصدارات قاعدة البيانات MySQL المدعومة? =
A: جميع إصدارات MySQL 4 تعمل, دعم إصدار MySQL 3 أضيف في الإصدارة 2.12 من هذه الإضافة.

= هل أنا أحتاج حقاً إلى إستخدام هذه الأداة? =
ربما لا إذا كان Google يعرف موقعك جيداً و يزوره يومياً. إذا لم يكن كذلك, ستكون أداة جيدة لإعلام Google بموقعك و التحديثات التي طرأت عليه. هذا سيجعل Google يحدث الصفحة فقط إذا تطلب الأمر ذلك و سوف يجعلك تحافظ على الـ Bandwith.
