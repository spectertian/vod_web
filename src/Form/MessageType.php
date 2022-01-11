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
            'data-class'    => Message::class,
            'csrf_token_id' => 'task_item',

        ]);
    }
}
