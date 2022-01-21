<?php

namespace App\Form;

use App\Document\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $question_options = [
            'attr'  => [
                "id"          => "gb_content",
                "class"       => "form-control",
                "maxlength"   => "200",
                "placeholder" => "报错请说清楚下载环境与具体片名集数"
            ],
            'label' => false

        ];

        $submit_options = [
            'attr'  => [
                "id"    => "gb_button",
                "class" => "btn btn-default pull-right",
                "type"  => "submit",
                "value" => "发表留言"
            ],
            'label' => '发表留言'
        ];
        $builder
            ->add('question', TextareaType::class, $question_options)
            ->add('save', SubmitType::class, $submit_options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data-class'      => Message::class,
            // enable/disable CSRF protection for this form
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'task_item',

        ]);
    }
}
