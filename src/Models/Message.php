<?php

namespace Coderflex\LaravelTicket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Coderflex\LaravelTicket\Models\Message
 *
 * @property int $user_id
 * @property string $message
 */
class Message extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Get Ticket RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(): BelongsTo
    {
        $tableName = config('laravel-ticket.table_names.messages', 'messages');

        return $this->belongsTo(
            Ticket::class,
            $tableName['columns']['ticket_foreing_id']
        );
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config(
            'laravel-ticket.table_names.messages.table',
            parent::getTable()
        );
    }
}
