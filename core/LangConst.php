<?php
namespace core;

use misc\Lang;

interface LangConst{
    /**
     * @category Main constants
     */
    const mainOK =
        [
            Lang::RU => 'Ok',
            Lang::EN => 'Ok',
        ];
    const mainCancel =
        [
            Lang::RU => 'Отмена',
            Lang::EN => 'Cancel',
        ];
    const mainOpen =
        [
            Lang::RU => 'Открыть',
            Lang::EN => 'Open',
        ];
    const mainClose =
        [
            Lang::RU => 'Закрыть',
            Lang::EN => 'Close',
        ];
    const mainYes =
        [
            Lang::RU => 'Да',
            Lang::EN => 'Yes',
        ];
    const mainNo =
        [
            Lang::RU => 'Нет',
            Lang::EN => 'No',
        ];
    const mainDelete =
        [
            Lang::RU => 'Удалить',
            Lang::EN => 'Delete',
        ];
    const mainDeleting =
        [
            Lang::RU => 'Удаление',
            Lang::EN => 'Delete',
        ];
    const mainEdit =
        [
            Lang::RU => 'Редактировать',
            Lang::EN => 'Edit',
        ];
    const mainEditing =
        [
            Lang::RU => 'Редактирование',
            Lang::EN => 'Edit',
        ];
    const mainAdd =
        [
            Lang::RU => 'Добавить',
            Lang::EN => 'Add',
        ];
    const mainSave =
        [
            Lang::RU => 'Сохранить',
            Lang::EN => 'Save',
        ];
    const mainCreate =
        [
            Lang::RU => 'Создать',
            Lang::EN => 'Create',
        ];
    const mainSend =
        [
            Lang::RU => 'Отправить',
            Lang::EN => 'Sand',
        ];
    const mainEnter =
        [
            Lang::RU => 'Войти',
            Lang::EN => 'Enter',
        ];
    const mainSettings =
        [
            Lang::RU => 'Настройки',
            Lang::EN => 'Settings',
        ];
    const mainEmail =
        [
            Lang::RU => 'Почта',
            Lang::EN => 'E-mail',
        ];
    const mainPassword =
        [
            Lang::RU => 'Пароль',
            Lang::EN => 'Password',
        ];
    const mainLogin =
        [
            Lang::RU => 'Войти',
            Lang::EN => 'Login',
        ];
    const mainUsername =
        [
            Lang::RU => 'Имя пользователя',
            Lang::EN => 'User name',
        ];
    const mainLogout =
        [
            Lang::RU => 'Выйти',
            Lang::EN => 'Logout',
        ];
    const mainStatus =
        [
            Lang::RU => 'Статус',
            Lang::EN => 'Status',
        ];
    const mainState =
        [
            Lang::RU => 'Состояние',
            Lang::EN => 'State',
        ];
    const mainActions =
        [
            Lang::RU => 'Действия',
            Lang::EN => 'Actions',
        ];
    const mainStatusOK =
        [
            Lang::RU => 'Ok',
            Lang::EN => 'Ok',
        ];
    const mainStatusError =
        [
            Lang::RU => 'Ошибка',
            Lang::EN => 'Error',
        ];
    const mainStatusUnknown =
        [
            Lang::RU => 'Не известно',
            Lang::EN => 'Unknown',
        ];
    const mainLangRU =
        [
            Lang::RU => 'Русский',
            Lang::EN => 'Russian',
        ];
    const mainLangEN =
        [
            Lang::RU => 'Английский',
            Lang::EN => 'English',
        ];


    /**
     * @category Auth constants
     */

    const loginIncorrectCreds =
        [
            Lang::RU => 'Неверный логин/пароль',
            Lang::EN => 'Incorrect login/password',
        ];
    const loginAuthTitle =
        [
            Lang::RU => 'Авторизация',
            Lang::EN => 'Auth',
        ];

    /**
     * @category Tasks constants
     */

    const tasksTitle =
        [
            Lang::RU => 'Список задач',
            Lang::EN => 'Task list',
        ];
    const tasksUsername =
        [
            Lang::RU => 'Имя пользователя',
            Lang::EN => 'User name',
        ];
    const tasksEmail = self::mainEmail;
    const tasksText =
        [
            Lang::RU => 'Текст',
            Lang::EN => 'Text',
        ];
    const tasksEmptyList =
        [
            Lang::RU => 'Список задач пуст',
            Lang::EN => 'No tasks yet',
        ];
    const tasksNoTask =
        [
            Lang::RU => 'Нет задачи #%s',
            Lang::EN => 'Task #%s does not exists',
        ];
    const tasksTitleSave =
        [
            Lang::RU => 'Редактирование задачи',
            Lang::EN => 'Task editing',
        ];
    const tasksTitleAdd =
        [
            Lang::RU => 'Добавление задачи',
            Lang::EN => 'Task adding',
        ];
    const tasksAddNew =
        [
            Lang::RU => 'Создать задачу',
            Lang::EN => 'Create task',
        ];
    const tasksSavedOne =
        [
            Lang::RU => 'Задача #%s сохранена',
            Lang::EN => 'Task #%s saved',
        ];
    const tasksAddedOne =
        [
            Lang::RU => 'Задача #%s добавлена',
            Lang::EN => 'Task #%s added',
        ];
    const tasksNoData =
        [
            Lang::RU => 'Поле <b>%s</b> обязательно для заполнения',
            Lang::EN => 'Field <b>%s</b> is required',
        ];


}

