<?php

$config = array(
           'blog/comment' => array(
                            array(
                                    'field' => 'nickname',
                                    'label' => 'lang:nickname',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'passconf',
                                    'label' => 'PasswordConfirmation',
                                    'rules' => 'required'
                                 ),
                            array(
                                    'field' => 'email',
                                    'label' => 'Email',
                                    'rules' => 'required'
                                 )
                            )
               );