<?php

// Generated on 30/07/2014 09:57:01

// 167 out of 167 messages are translated (100%).
// 888 out of 888 words are translated (100%).

return array(
    #: config/permissions.config.php:21
    'Is granted access to the following contexts:' => '以下のコンテキストからアクセスできます。',

    #: config/permissions.config.php:26
    'Is granted access to the following applications:' => '以下のアプリケーションからアクセスできます。',

    #. Note to translator: action (button)
    #: config/orm/behaviour/twinnable.config.php:25
    'Translate' => '翻訳する',

    #: config/orm/behaviour/twinnable.config.php:27
    'Add to another site' => '別のサイトに追加する',

    #: config/orm/behaviour/twinnable.config.php:29
    'Translate / Add to another site' => '別のサイトに翻訳 / 追加する',

    #: config/orm/behaviour/twinnable.config.php:66
    #: config/orm/behaviour/twinnable.config.php:73
    'Translate into {{context}}' => '{{context}}に翻訳する',

    #: config/orm/behaviour/twinnable.config.php:68
    #: config/orm/behaviour/twinnable.config.php:71
    #: views/form/layout_standard.view.php:82
    'Add to {{context}}' => '{{context}}に追加',

    #: config/orm/behaviour/twinnable.config.php:77
    'Edit {{context}}' => '{{context}}を編集する',

    #: config/orm/behaviour/publishable.config.php:16
    #: classes/controller/inspector.ctrl.php:77
    'Status' => '公開状態',

    #: config/orm/behaviour/sharable.config.php:16
    'Share' => '共有',

    #: config/orm/behaviour/urlenhancer.config.php:16
    'Visualise' => '閲覧',

    #. Note to translator: Default copy meant to be overwritten by applications (e.g. Add Page > Add a page)
    #: config/common.config.php:17
    'Add {{model_label}}' => '{{model_label}}を追加',

    #. Standard, most frequent actions (Edit, Visualise, Share, etc.)
    #: config/common.config.php:38
    'Edit' => '編集',

    #. Deletion popup
    #: config/common.config.php:62
    #: config/i18n_common.config.php:20
    'Deleting the item ‘{{title}}’' => 'アイテム‘{{title}}’を削除します',

    #: config/common.config.php:65
    'Delete' => '削除',

    #. Crud
    #. Note to translator: Default copy meant to be overwritten by applications (e.g. The item has been deleted > The page has been deleted). The word 'item' is not to feature in Novius OS.
    #: config/i18n_common.config.php:8
    'Done! The item has been added.' => 'おめでとうございます。アイテムが追加されました。',

    #: config/i18n_common.config.php:9
    #: classes/controller/admin/datacatcher.ctrl.php:49
    'OK, all changes are saved.' => 'はい、変更を保存しました。',

    #: config/i18n_common.config.php:10
    'The item has been deleted.' => 'このアイテムは削除されました。',

    #. General errors
    #: config/i18n_common.config.php:13
    'This item doesn’t exist any more. It has been deleted.' => 'このアイテムは存在しません。削除されました。',

    #: config/i18n_common.config.php:14
    'We cannot find this item.' => 'このアイテムは見つかりませんでした。',

    #: config/i18n_common.config.php:15
    'Bye bye' => 'それではまた。',

    #: config/i18n_common.config.php:16
    #: classes/controller/admin/noviusos.ctrl.php:116
    'Close tab' => 'タブを閉じる',

    #: config/i18n_common.config.php:17
    'You’re not allowed to carry out this action. Ask your colleagues to find out why.' => 'あなたはこの操作を許可されていません。管理者に問い合わせてください。',

    #: config/i18n_common.config.php:21
    'Last chance, there’s no undo. Are you sure you want to do this?' => '最終確認です。この作業は取り消しできません。本当に実行しますか？',

    #. Delete action's labels
    #: config/i18n_common.config.php:24
    '{{Button}} or <a>No, cancel</a>' => '{{Button}} または<a>取り消し</a>',

    #: config/i18n_common.config.php:25
    'Yes, delete' => 'はい、削除します',

    #: config/i18n_common.config.php:26
    'Nothing to delete' => '削除するものがありません',

    #: config/i18n_common.config.php:28
    'Yes, delete this item' => array(
        0 => 'はい、このアイテムを削除します',
    ),

    #: config/i18n_common.config.php:32
    'To confirm the deletion, you need to enter this number in the field below:' => '削除の意思を確認するため、この数字を下の欄に入力してください。',

    #: config/i18n_common.config.php:33
    'We cannot delete this item as the number of sub-items you’ve entered is wrong. Please amend it.' => '入力した数字が間違っているため、このアイテムを削除できません。修正してください。',

    #: config/i18n_common.config.php:36
    '1 item' => array(
        0 => '1個のアイテム',
    ),

    #: config/i18n_common.config.php:42
    'This item exists in <strong>one context</strong>.' => array(
        0 => 'このアイテムは<strong>{{context_count}}つのコンテキスト</strong>にあります。',
    ),

    #: config/i18n_common.config.php:46
    'This item exists in <strong>one language</strong>.' => array(
        0 => 'このアイテムは<strong>{{language_count}}つの言語</strong>に翻訳されています。',
    ),

    #. Keep only if the model has the behaviour Twinnable
    #: config/i18n_common.config.php:51
    'We’re afraid this item cannot be added to {{context}} because its <a>parent</a> is not available in this context yet.' => '申し訳ないですが、このアイテムは{{context}}に追加できません。 このアイテム<a>親</a>がこのコンテキストで利用可能になっていないからです。',

    #: config/i18n_common.config.php:52
    'We’re afraid this item cannot be translated into {{language}} because its <a>parent</a> is not available in this language yet.' => '申し訳ないですが、このアイテムは{{language}}に翻訳できません。 このアイテム<a>親</a>がこのコンテキストで利用可能になっていないからです。',

    #: config/i18n_common.config.php:53
    'This item cannot be added in {{context}}. (How come you get this error message? You’ve hacked your way into here, haven’t you?)' => 'このアイテムは、{{context}}に追加できません。(どうやってこのエラーメッセージを表示しているのでしょう？ハッキングしてきたのでしょうか？)',

    #: config/i18n_common.config.php:57
    'This item has <strong>one sub-item</strong>.' => array(
        0 => 'この項目には<strong>{{children_count}}つの子項目</strong>があります。',
    ),

    #. Visualise action's labels
    #: config/i18n_common.config.php:62
    'This application hasn’t yet been added to a page. Visualising is therefore impossible.' => 'このアプリケーションは、ページに追加されていません。そのため閲覧できません。',

    #. Appdesk: allLanguages
    #: config/i18n_common.config.php:65
    'All languages' => '全ての言語',

    #: config/i18n_common.config.php:66
    'All sites' => '全てのサイト',

    #: config/i18n_common.config.php:67
    'All contexts' => '全てのコンテキスト',

    #: config/i18n_common.config.php:68
    'List' => '一覧',

    #: config/i18n_common.config.php:69
    'Tree' => '木',

    #: config/i18n_common.config.php:70
    'Thumbnails' => 'サムネイル',

    #: config/i18n_common.config.php:71
    'Preview' => 'プレビュー',

    #: config/i18n_common.config.php:72
    #: views/inspector/modeltree_checkbox.view.php:15
    #: views/inspector/modeltree_radio.view.php:15
    #: classes/controller/admin/noviusos.ctrl.php:123
    'Loading...' => '読み込み中...',

    #: config/i18n_common.config.php:73
    #: config/i18n_common.config.php:84
    'Languages' => '言語',

    #: config/i18n_common.config.php:74
    'Search' => '検索',

    #: config/i18n_common.config.php:75
    'Select the site(s) to show' => '表示するサイトを選択する',

    #: config/i18n_common.config.php:76
    'Select the language(s) to show' => '表示する言語を選択する',

    #: config/i18n_common.config.php:77
    'Select the context(s) to show' => '表示するコンテキストを選択する',

    #: config/i18n_common.config.php:78
    'Show {{context}}' => '{{context}}を表示する',

    #: config/i18n_common.config.php:79
    'Other sites' => '他のサイト',

    #: config/i18n_common.config.php:80
    'Other languages' => '他の言語',

    #: config/i18n_common.config.php:81
    'Other contexts' => '他のコンテキスト',

    #: config/i18n_common.config.php:82
    'Contexts' => 'コンテキスト',

    #: config/i18n_common.config.php:83
    'Sites' => 'サイト',

    #: config/validation.config.php:15
    'We need you to fill in this field.' => 'このフィールドに入力してください。',

    #: config/validation.config.php:16
    'This field’s value must be at least {{param:1}} characters long.' => 'このフィールドは、最低{{param:1}}文字です。',

    #: config/validation.config.php:17
    'This field’s value musn’t be longer than {{param:1}} characters.' => 'このフィールドは、最大{{param:1}}文字です。',

    #: config/validation.config.php:18
    'This isn’t a valid date.' => '有効な日付ではありません。',

    #: config/validation.config.php:19
    'This isn’t a valid email address.' => '有効なメールアドレスではありません。',

    #: config/validation.config.php:20
    'The old password is incorrect.' => '現在のパスワードが間違っています。',

    #: config/validation.config.php:21
    'They don’t match. Are you sure you’ve typed the same thing?' => '一致しません。同じ文字列を入力しましたか？',

    #: views/form/layout_save.view.php:22
    #: views/form/action_or_cancel.view.php:17
    'or' => 'あるいは',

    #: views/form/layout_save.view.php:22
    #: views/form/action_or_cancel.view.php:19
    'Cancel' => '取り消し',

    #: views/form/action_or_cancel.view.php:15
    #: views/admin/data_catcher/form.view.php:168
    #: views/admin/enhancer/popup.view.php:52
    'Save' => '保存',

    #: views/errors/php_fatal_error.view.php:82
    #: views/errors/php_fatal_error.view.php:187
    'Something went wrong' => '何かおかしいようです。',

    #: views/errors/php_fatal_error.view.php:94
    'You won’t like this: Something went wrong' => '申し訳ありません。何かおかしいようです。',

    #: views/errors/php_fatal_error.view.php:95
    'What went wrong? <a>If you’re a developer, just click to find out</a>. If you’re not, go ask a developer to help you.' => '何かおかしいようです。<a>あなたが開発者なら、ここをクリックして確認してください。</a>開発者でない方は、開発者に連絡してください。',

    #: views/admin/login.view.php:37
    #: views/admin/login_popup.view.php:30
    'Email address' => 'メールアドレス',

    #: views/admin/login.view.php:38
    #: views/admin/login_popup.view.php:31
    'Password' => 'パスワード',

    #: views/admin/login.view.php:42
    #: views/admin/login_popup.view.php:35
    'Remember me' => 'ログイン情報を記憶する',

    #: views/admin/login.view.php:45
    'Let’s get started' => 'では始めましょう',

    #: views/admin/html.view.php:113
    'Select a media file' => 'メディアファイルを選択',

    #: views/admin/html.view.php:114
    'Pick an image' => '画像を選択',

    #: views/admin/html.view.php:115
    'We’re afraid we cannot find this image.' => 'この画像は見つかりませんでした。',

    #: views/admin/data_catcher/applications.view.php:59
    '‘{{item}}’ can be shared with the following applications.' => '‘{{item}}’は、以下のアプリケーションで共有できます。',

    #: views/admin/data_catcher/applications.view.php:60
    'Click to share:' => 'クリックして共有:',

    #: views/admin/data_catcher/applications.view.php:61
    '(Don’t worry, you’ll get a preview first)' => '(安心してください。プレビューで確認できます。)',

    #: views/admin/data_catcher/applications.view.php:63
    '‘{{item}}’ is automatically shared with the following applications.' => '‘{{item}}’は、以下のアプリケーションで自動的に共有されます。',

    #: views/admin/data_catcher/applications.view.php:64
    'No action required, click to customise:' => '作業が不要なアプリケーションです。クリックしてカスタマイズしてください。',

    #: views/admin/data_catcher/applications.view.php:80
    'How sad! ‘{{item}}’ cannot be shared with any application yet. Ask your developer to set up content sharing for you.' => '残念ですが、‘{{item}}’はまだアプリケーションで共有できるようになっていません。開発者に連絡して、コンテンツを共有できるようにお願いしてください。',

    #: views/admin/data_catcher/form.view.php:39
    'Title:' => 'タイトル:',

    #: views/admin/data_catcher/form.view.php:44
    'URL:' => 'URL:',

    #: views/admin/data_catcher/form.view.php:56
    'Image:' => '画像:',

    #: views/admin/data_catcher/form.view.php:64
    'Description:' => '説明:',

    #: views/admin/data_catcher/form.view.php:112
    'Use default' => 'デフォルトを使用する',

    #: views/admin/data_catcher/form.view.php:144
    'Pick a custom image' => 'カスタム画像を選択',

    #: views/admin/data_catcher/panel.view.php:29
    'What is shared - Default properties' => '共有されるデータ、デフォルトのプロパティ',

    #: views/admin/data_catcher/panel.view.php:47
    'Applications' => 'アプリケーション',

    #: views/admin/permissions/list_app.view.php:4
    'Check all' => '全て選択',

    #: views/admin/login_popup.view.php:21
    'You’ve been inactive for too long. We need to make sure this is really you.' => 'お久しぶりですね。本人かどうか、確認させてください。',

    #: views/admin/login_popup.view.php:38
    'Resume my work' => 'ログイン',

    #: views/admin/about.view.php:19
    'Create Once Publish Everywhere with Novius OS, a Cross-Channel Open Source CMS.' => '様々なメディアに対応したオープンソースの CMS である Novius OS では、一度作成したコンテンツはどこでも配信できます。',

    #: views/admin/about.view.php:21
    'Version:' => 'バージョン:',

    #: views/admin/about.view.php:23
    'License:' => 'ライセンス:',

    #: views/admin/about.view.php:23
    'GNU AGPL v3' => 'GNU AGPL v3',

    #: views/admin/orm/publishable_label.view.php:7
    #: views/admin/orm/publishable_label.view.php:25
    #: views/renderer/publishable.view.php:136
    'Not published' => '公開されていない',

    #: views/admin/orm/publishable_label.view.php:9
    #: views/admin/orm/publishable_label.view.php:31
    #: views/renderer/publishable.view.php:141
    'Published' => '公開されている',

    #: views/admin/orm/publishable_label.view.php:21
    'Scheduled for {{date}}' => '{{date}}に公開予定',

    #: views/admin/orm/publishable_label.view.php:27
    'Published until {{date}}' => '{{date}}まで公開',

    #. Note to translator: action (button)
    #: views/admin/enhancer/popup.view.php:44
    'Update' => '更新',

    #: views/admin/enhancer/popup.view.php:48
    'Insert' => '挿入',

    #: views/admin/enhancer/popup.view.php:56
    '{{Save}} or <a>Cancel</a>' => '{{Save}} または<a>取り消し</a>',

    #: views/admin/tray.view.php:23
    #: views/admin/tray.view.php:26
    'My account' => 'マイアカウント',

    #: views/admin/tray.view.php:29
    'Switch language' => '言語を切り替える',

    #: views/admin/tray.view.php:40
    #: views/admin/tray.view.php:43
    'About Novius OS' => 'Novius OS について',

    #: views/admin/tray.view.php:97
    'Sign out (see you!)' => 'ログアウトします。それではまた。',

    #: views/admin/tray.view.php:109
    'Toggle full screen' => '全画面表示',

    #: views/renderer/virtualname/use_title_checkbox.view.php:15
    'Use title' => 'タイトルを使用する',

    #: views/renderer/publishable.view.php:117
    '<row><cell>Scheduled from:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>to:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開開始予定:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>公開終了:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:118
    '<row><cell>Published since:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>until:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開日時:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>公開終了:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:119
    '<row><cell>Was published from:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>to:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開日時:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>公開終了:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:122
    '<row><cell>Will be scheduled from:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>to:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開開始予定:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>公開終了:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:123
    '<row><cell>Will be published from:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>until:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開開始予定:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>until:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:124
    '<row><cell>Will be backdated from:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>to:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>' => '<row><cell>公開中止予定:</cell><cell>{{start}}</cell><cell>{{clear}}</cell></row><row><cell>公開中止終了:</cell><cell>{{end}}</cell><cell>{{clear}}</cell></row>',

    #: views/renderer/publishable.view.php:126
    'Pick a date' => '日付を選択',

    #: views/renderer/publishable.view.php:127
    'Clear' => '消去',

    #: views/renderer/publishable.view.php:132
    'Will not be published' => '公開しない',

    #: views/renderer/publishable.view.php:133
    #: views/renderer/publishable.view.php:137
    #: views/renderer/publishable.view.php:145
    'Will be published' => '公開する',

    #: views/renderer/publishable.view.php:140
    #: views/renderer/publishable.view.php:144
    'Will be unpublished' => '非公開にする',

    #: classes/controller/inspector/date.ctrl.php:152
    'Custom dates' => '日付を指定',

    #: classes/controller/inspector/date.ctrl.php:153
    'from {{begin}} to {{end}}' => '{{begin}}から{{end}}まで',

    #: classes/controller/inspector/date.ctrl.php:154
    'until {{end}}' => '{{end}}まで',

    #: classes/controller/inspector/date.ctrl.php:155
    'since {{begin}}' => '{{begin}}から',

    #: classes/controller/inspector/date.ctrl.php:159
    'Since' => '以降',

    #: classes/controller/inspector/date.ctrl.php:161
    '3 last days' => '過去3日間',

    #: classes/controller/inspector/date.ctrl.php:162
    'Week beginning' => '週の初め',

    #: classes/controller/inspector/date.ctrl.php:163
    'Less than a week' => '一週間以内',

    #: classes/controller/inspector/date.ctrl.php:164
    'Month beginning' => '月の初め',

    #: classes/controller/inspector/date.ctrl.php:165
    'Less than one month' => '一ヶ月以内',

    #: classes/controller/inspector/date.ctrl.php:166
    'Less than two months' => '二ヶ月以内',

    #: classes/controller/inspector/date.ctrl.php:167
    'Less than three months' => '三ヶ月以内',

    #: classes/controller/inspector/date.ctrl.php:168
    'Less than six months' => '六ヶ月以内',

    #: classes/controller/inspector/date.ctrl.php:169
    'Less than one year' => '一年以内',

    #: classes/controller/inspector/date.ctrl.php:173
    'Previous months' => '先月',

    #: classes/controller/inspector/date.ctrl.php:179
    'Years' => '年',

    #: classes/controller/admin/enhancer.ctrl.php:123
    'I’m an application. Give me a name!' => 'アプリケーションに名前をつけてください。',

    #: classes/controller/admin/noviusos.ctrl.php:115
    'New tab' => '新しいタブ',

    #: classes/controller/admin/noviusos.ctrl.php:117
    'Close all tabs' => 'タブを全て閉じる',

    #: classes/controller/admin/noviusos.ctrl.php:118
    'Close all other tabs' => '他のタブを全て閉じる',

    #: classes/controller/admin/noviusos.ctrl.php:119
    'Are you sure to want to close all tabs?' => '全てのタブを閉じてよろしいですか？',

    #: classes/controller/admin/noviusos.ctrl.php:120
    'Are you sure to want to close all other tabs?' => 'その他のタブを全て閉じてよろしいですか？',

    #: classes/controller/admin/noviusos.ctrl.php:121
    'Reload tab' => 'タブを再読み込み',

    #: classes/controller/admin/noviusos.ctrl.php:122
    'Move tab' => 'タブを移動',

    #: classes/controller/admin/datacatcher.ctrl.php:73
    'We know it sounds stupid, but this isn’t supposed to happen. Please contact your developer or Novius OS to fix this. We apologise for the inconvenience caused.' => '予想していないことが起きました。ソフト開発者または Novius OS に連絡して、修正を依頼してください。ご迷惑をお掛けして申し訳ありません。',

    #: classes/controller/admin/datacatcher.ctrl.php:80
    'We cannot find ‘{{item}}’. It must have been deleted while you tried to share it. Bad luck.' => '‘{{item}}’が見つかりませんでした。共有しようとする前に削除されたかもしれません。残念でした。',

    #: classes/controller/admin/datacatcher.ctrl.php:85
    'Surprisingly it appears ‘{{item}}’ cannot be shared with ‘{{catcher}}’. Contact your developer for further details.' => '不思議なことに、‘{{item}}’が‘{{catcher}}’で共有できません。詳しくは開発者に連絡してください。',

    #: classes/controller/admin/datacatcher.ctrl.php:92
    'Something went wrong. Please ask your developer or Novius OS to have a look into this. You could call your mother too but we doubt she would be much help. Unless your mum is a software engineer, which would be awesome. We forgot to say: We apologise for the inconvenience caused.' => '何か問題が発生しました。開発者または Novius OS に連絡してください。友人に聞くこともできますが、友人がソフトウェアエンジニアでなければ、助けにはならないでしょう。ご迷惑をお掛けして申し訳ありません。',

    #: classes/controller/admin/login.ctrl.php:45
    'Welcome back, {{user}}.' => 'ようこそ、{{user}}さん。',

    #: classes/controller/admin/login.ctrl.php:121
    'These details won’t get you in. Are you sure you’ve typed the correct email address and password? Please try again.' => 'ログインに失敗しました。メールアドレスとパスワードが正しいか、確認して、もう一度お試しください。',

    #: classes/fuel/fieldset_field.php:59
    'Mandatory' => '必須',

    #: classes/fuel/validation_error.php:47
    'The field ‘{{field}}’ doesn’t respect the rule ‘{{rule}}’' => 'フィールド‘{{field}}’はルール‘{{rule}}’に従っていないようです。',

    #. Date syntax is the one from PHP strftime() function: http://php.net/strftime
    #. Example value: '%d %b %Y %H:%M' (day of month, month name, year, hour, minutes).
    #: classes/fuel/date.php:79
    'DATE_FORMAT_DEFAULT' => '%d %b %Y %H:%M',

    #: classes/fuel/fieldset.php:426
    'Invalid request, you may have been victim of hacking. Did you click any suspicious link?' => '無効なリクエストです。攻撃かもしれません。不審なリンクをクリックしませんでしたか？',

    #: classes/fuel/fieldset.php:619
    'OK, it’s done.' => '保存されました。',

    #: classes/application.php:504
    'A template from this application have the same name that in your local configuration:' => array(
        0 => 'このアプリケーションのテンプレートに、local 設定と同じ名前のものがあります。',
    ),

    #: classes/application.php:532
    'A template from this application is used in templates variations' => array(
        0 => 'このアプリケーションのテンプレートは、派生テンプレートで使用されています。',
    ),

    #: classes/application.php:537
    'Templates variations are:' => '派生テンプレートの一覧: ',

    #: classes/application.php:549
    'A launcher from this application have the same name that in your local configuration:' => array(
        0 => 'このアプリケーションのlauncherに、local 設定と同じ名前のものがあります。',
    ),

    #: classes/application.php:566
    'A enhancer from this application have the same name that in your local configuration:' => array(
        0 => 'このアプリケーションのenhancerに、local 設定と同じ名前のものがあります。',
    ),

    #: classes/application.php:583
    'A data catcher from this application have the same name that in your local configuration:' => array(
        0 => 'このアプリケーションのdata catcherに、local 設定と同じ名前のものがあります。',
    ),

    #: classes/renderer/item/picker.php:38
    'No item selected' => 'アイテムが選択されていません',

    #: classes/renderer/item/picker.php:39
    'Pick an item' => 'アイテムを選択',

    #: classes/renderer/item/picker.php:40
    'Pick another item' => '別のアイテムを選択',

    #: classes/renderer/item/picker.php:41
    'Un-select this item' => 'アイテムを外す',

);
