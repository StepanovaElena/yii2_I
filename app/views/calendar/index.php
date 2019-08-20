<?php
use marekpetras\calendarview\CalendarView;

echo CalendarView::widget(
    [
        // mandatory
        'dataProvider'  => $dataProvider,
        'dateField'     => 'startDay_fld',
        'valueField'    => 'title_fld',


        // optional params with their defaults
        'unixTimestamp' => false, // indicate whether you use unix timestamp instead of a date/datetime format in the data provider
        'weekStart' => 1, // date('w') // which day to display first in the calendar
        'title'     => 'Календарь активностей',

        'views'     => [
            'calendar' => '@vendor/marekpetras/yii2-calendarview-widget/views/calendar',
            'month' => '@vendor/marekpetras/yii2-calendarview-widget/views/month',
            'day' => 'day',
        ],

        'startYear' => date('Y') - 1,
        'endYear' => date('Y') + 1,

        'link' => function($model,$calendar){
            return ['activity/view','id'=>$model->id_fld];
            },
        //'link' => false,
        /* alternates to link , is called on every models valueField, used in Html::a( valueField , link )
        'link' => 'site/view',
        'link' => function($model,$calendar){
            return ['calendar/view','id'=>$model->id];
        },
        */

        //'dayRender' => false,
        /* alternate to dayRender
        'dayRender' => function($model,$calendar) {
            return '<p>'.$model->id.'</p>';
        },
        */

    ]
);



