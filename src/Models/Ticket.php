<?php

namespace Coderflex\LaravelTicket\Models;

use Coderflex\LaravelTicket\Concerns\InteractsWithTickets;
use Coderflex\LaravelTicket\Scopes\TicketScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

/**
 * Coderflex\LaravelTicket\Models\Ticket
 *
 * @property string $uuid
 * @property int $user_id
 * @property string $title
 * @property string $message
 * @property string $priority
 * @property string $status
 * @property bool $is_resolved
 * @property bool $is_locked
 */
class Ticket extends Model
{
    use HasFactory;
    use TicketScope;
    use InteractsWithTickets;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Get User RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Messages RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get Categories RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categorizable');
    }

    /**
     * Get Labels RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'labelable');
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config(
            'laravel_ticket.table_names.tickets',
            parent::getTable()
        );
    }
}
