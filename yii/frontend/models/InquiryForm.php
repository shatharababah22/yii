<?php

namespace frontend\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class InquiryForm extends Model
{
    public $type;
    public $from_country;
    public $to_country;
    public $date;
    public $duration;
    public $adult;
    public $children;
    public $infants;
    public $plan;
    public $pax_type;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['type', 'from_country', 'to_country', 'date', 'duration','pax_type', 'adult', 'children', 'infants', 'plan'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type' => 'Type',
            'from_country' => 'Departure Country',
            'to_country' => 'Arrival Country',
            'date' => 'Departure Date',
            'duration' => 'Duration',
            'adult' => 'Adult',
            'children' => 'Children',
            'infants' => 'Infants',
            'pax_type'=>'Pax Type',
        ];
    }
}
