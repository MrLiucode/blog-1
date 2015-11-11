<?php
/**
 * menu.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

return [
    '博文管理' => [
        'class' => 'fa fa-laptop',
        'child' => [
            ['text' => '文章列表', 'as' => 'admin.article.index'],
            ['text' => '分类列表', 'as' => 'admin.category.index'],
            ['text' => '标签列表', 'as' => 'admin.category.index'], //TODO：需要做修改
        ],
    ],
    '权限管理' => [
        'class' => 'fa fa-laptop',
        'child' => [
            ['text' => '权限列表', 'as' => 'admin.acl.permission.index'],
            ['text' => '权限组列表', 'as' => 'admin.acl.group.index'],
        ]
    ],
];