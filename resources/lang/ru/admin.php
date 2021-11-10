<?php
return [
    'settings' => [
        'Name' => 'Настройки',
        'Description' => 'Страница изменения настроек',
        'Edit' => 'Редактировать',
        'Contacts' => 'Контакты',
        'Delivery' => 'Доставка',
        'User' => 'Пользователь',
        'Title' => 'Название',
        'Value' => 'Значение',
        'Action' => 'Действия',
        'updated' => 'Успешно обновлено',
        'editing' => 'Редактирование опции',
        'Update' => 'Изменить',
        'configuration' => 'Конфигурация',
        'general' => 'Основные настройки',
    ],

    'menu' => [
        'elements' => 'Сущности',
        'right' => 'Все права защищены.',
    ],

    'import' =>[
        'panel_name' => 'Импорт',
        'screen_name' => 'Импорт базы данных',
        'screen_description' => ''
    ],
    /*
      |--------------------------------------------------------------------------
      | Banner slaider Admin panel Language Lines
      |--------------------------------------------------------------------------
      */

    'banners'=>[
        'panel_name' => 'Баннеры',
        'manage_banners' => 'Управление баннерами',
        'add_new_banner' => 'Добавить новый баннер',
        'edit_banner' => 'Редактирование баннера',
        'title' => 'Заголовок',
        'subtitle' => 'Подзаголовок',
        'button_text' => 'Текст кнопки',
        'href' => 'Ссылка для кнопки',
        'is_active' => 'Активировать баннер',
        'image' => 'Изображение баннера',
        'title_placeholder' => 'Введите заголовок для баннера',
        'subtitle_placeholder' => 'Введите подзаголовок для баннера',
        'button_text_placeholder' => 'Введите текст кнопки для баннера',
        'href_placeholder' => 'Введите ссылку для кнопки баннера',
        'is_active_placeholder' => 'Если флаг установлен, баннер будет отображаться',
        'image_help' => 'Изображение может иметь максимальную высоту 454px и ширину 735px',
        'success_info' => 'Вы успешно создали баннер.',
        'delete_info' => 'Вы успешно удалили баннер.',
        'active' => 'Активность',
    ],

    // permissions
    'permissions' => [
        'customer' => [
            'group_name' => 'Покупатель',
            'discounts' => 'Доступ к просмотру скидок на портале'
        ]
    ],

    'category' => [
        'panel_name' => 'Категории',
        'name_placeholder' => 'Введите название категории',
        'screen_name' => 'Управление категориями',
        'screen_description' => 'Категории товаров',
        'add_new' => 'Добавить новую категорию',
        'edit' => 'Редактировать/Создать категорию',
        'title' => 'Категория',
        'parent' => 'Родителькая категория',
        'edit_category' => 'Редактирование/Создание категории',
        'icon' => 'Иконка категории',
        'icon_help' => 'Выберите изображение иконки которое будет отображаться в меню',
        'success_info' => 'Вы успешно создали категорию.',
        'delete_info' => 'Вы успешно удалили категорию.',
        'image_id' => 'Выберите изображение для категории.',
        'is_active' => 'Отметьте чекбокс если категория активна.',
        'slug' => 'Введите симаольныей код для категории.',
        'slug_placeholder' => 'Симваольный код должен быть написан через тире.',
        'phone_number' => 'Официальный телефонный номер организации-продавца',
    ],

    'products' => [
        'panel_name' => 'Товары',
        'screen_name' => 'Управление товарами',
        'screen_description' => 'Список товаров',
        'add_new' => 'Добавить продукт',
        'edit' => 'Изменить',
        'name' => 'Название',
        'name_placeholder' => 'Введите название  продукта',
        'slug' => 'Символьный код продукта',
        'slug_placeholder' => 'Введите символьный код продукта',
        'manufacturer' => 'Производитель',
        'category' => 'Категория',
        'limited_edition' => 'Ограниченный тираж',
        'description' => 'Описание продукта',
        'full_description' => 'Описание продукта для вкладки описание',
        'main_tab' => 'Основные настройки',
        'images_tab' => 'Настройки изображений',
        'seller_prices_tab' => 'Настройки продавцов и цен',
        'success_info' => 'Изменения для продукта созранены успешно',
        'price_created' => 'Новая цена добавленна',
        'price_updated' => 'Цена обновлена',
        'price_deleted' => 'Цена удалена',
        'delete_info' => 'Продукт удален',
        'add_new_price_modal_button' => 'Добавить цену',
        'add_new_price_modal_title' => 'Добавление продавца и цены',
        'main_img_id' => 'Главное изображение товара',
        'additional_img' => 'Дополнительные изображения товара',
        'prices' => 'Цены',
        'price' => 'Цена',
        'edit_button' => 'Редактировать',
        'edit_modal_title' => 'Редактировать цену для ',
        'seller' => 'Продавец',
        'edit_title' => 'Редактирование продукта',
    ],

    'sellers' => [
        'panel_name' => 'Продавцы',
        'screen_name' => 'Управление продавцами',
        'screen_description' => 'Список продавцов',
        'add_new_seller' => 'Добавить нового продавца',
        'edit' => 'Редактировать продавца',
        'add' => 'Создать продваца',
        'title' => 'Название организации',
        'edit_seller' => 'Редактирование/Создание продавца',
        'name_placeholder' => 'Введите наименование организации-продавца',
        'phone_number' => 'Официальный номер телефона продавца',
        'phone_title' => 'Номер телефона',
        'description' => 'Описание компании',
        'description_placeholder' => 'Подробно об истории организации, предоставляемых товарах и услугах...',
        'address' => 'Юридический адрес организации',
        'address_placeholder' => 'Полный юридический адрес, указанный в ЕГРЮЛ(ЕГРИП)',
        'logo_id' => 'Загрузить логотип организации:',
        'success_info' => 'Продавец успешно создан',
        'delete_info' => 'Продавец успешно удалён',
    ],

    'discounts' => [
        'panel_name' => 'Скидки',
        'list' => 'Список скидок',
        'screen_name' => 'Управление скидками',
        'screen_description' => 'Список скидок',
        'add_discount' => 'Добавить скидку',
        'value' => 'Значение',
        'method_type' => 'Метод скидки',
        'category_type' => 'Вид скидки',
        'not_selected' => 'Не выбрано',
        'weight' => 'Вес',
        'minimal_cost' => 'Минимальная стоимость',
        'maximum_cost' => 'Максимальная стоимость',
        'minimal_qty' => 'Минимальное количество',
        'maximum_qty' => 'Максимальное количество',
        'start_at' => 'Дата начала',
        'end_at' => 'Дата окончания',
        'active' => 'Активна',
        'controls' => 'Управление',
        'edit' => 'Редактировать',
        'category' => [
            'product' => 'Товары',
            'groups' => [
                'title' => "Группы",
                'a' => "Группа а",
                'b' => "Группа б",
            ],
            'cart' => [
                'title' => 'Корзина',
            ]
        ]
    ],

    'orders' => [
        'panel_name' => 'Заказы',
        'screen_name' => 'Управление заказами',
        'screen_description' => 'Список заказов',
        'customer_name_title' => 'ФИО Заказчика',
        'customer_phone_title' => 'Телефон Заказчика',
        'order_delivery_type_title' => 'Тип доставки',
        'order_total_title' => 'Сумма заказа  в $',
        'delivery_type' => [
            'default' => 'обычная',
            'express' => 'ускоренная'
        ],
        'edit' => 'Редактировать заказ',
        'delivery_city' => 'Город',
        'delivery_address' => 'Адрес',
        'delivery_title' => 'Доставка',
        'comment_title' => 'Комментарий',
        'success_info' => 'Заказ успешно изменён',

    ],

    'reviews' => [
        'panel_name' => 'Отзывы',
        'screen_name' => 'Управление отзывами',
        'screen_description' => 'Список отзывов',
        'edit_review_with' => 'Редактирование отзыва с ID:',
        'edit' => 'Редактировать',
        'action' => 'Действия',
        'review' => 'Отзыв',
        'created' => 'Дата создания',
        'success' => 'Успешно обновлено',
    ],

];
