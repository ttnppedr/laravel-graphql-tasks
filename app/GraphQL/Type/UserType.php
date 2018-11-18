<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a user'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a user'
            ],
            'tasks' => [
                'type' => Type::listOf(GraphQL::type('Task')),
                'description' => 'The user tasks'
            ]
        ];
    }
}
