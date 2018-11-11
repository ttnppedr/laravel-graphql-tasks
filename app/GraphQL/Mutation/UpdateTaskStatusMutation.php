<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Task;

class UpdateTaskStatusMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTaskStatus'
    ];

    public function type()
    {
        return GraphQL::type('Task');
    }

    public function args()
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
                'rule' => ['required'],
            ],
            'status' => [
                'namu' => 'status',
                'type' => Type::nonNull(Type::boolean()),
                'rule' => ['required'],
            ]
        ];
    }

    public function resolke($root, $args)
    {
        $task = Task::find($args['id']);

        if (! $task) {
            return null;
        }

        $task->is_completed = $args['status'];
        $task->save();

        return $task;
    }
}
