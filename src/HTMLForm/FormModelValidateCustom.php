<?php

namespace Anax\HTMLForm;

/**
 * Example of FormModel implementation.
 */
class FormModelValidateCustom extends FormModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(
            [],
            [
                "input" => [
                    "type" =>"text",
                    "label" => "Add string (only validates string \"Mumintrollet\")",
                    "validation" => [
                        "custom_test" => [
                            "message" => "Your string did not match Mumintrollet.",
                            "test" => function ($value) {
                                return $value == "Mumintrollet";
                            }
                        ]
                    ],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Validate string",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button.
     */
    public function callbackSubmit()
    {
        $this->AddOutput("<p>#callbackSubmit()</p>");
        $this->AddOutput("<p>String matches Mumintrollet</p>");
        $this->saveInSession = true;

        return true;
    }
}