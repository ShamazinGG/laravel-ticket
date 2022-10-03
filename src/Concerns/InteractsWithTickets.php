<?php

namespace Coderflex\LaravelTicket\Concerns;

use Coderflex\LaravelTicket\Utils\Status;

trait InteractsWithTickets
{
    /**
     * Archive the ticket
     *
     * @return self
     */
    public function archive(): self
    {
        $this->update([
            'status' => Status::ARCHIVED,
        ]);

        return $this;
    }

    public function answer(): self
    {
        $this->update([
            'status' => Status::ANSWERED,
        ]);

        return $this;
    }
    /**
     * Close the ticket
     *
     * @return self
     */
    public function close(): self
    {
        $this->update([
            'status' => Status::CLOSED,
        ]);

        return $this;
    }

    /**
     * Reopen the ticket
     *
     * @return self
     */
    public function reopen(): self
    {
        $this->update([
            'status' => Status::OPEN,
        ]);

        return $this;
    }

    /**
     * Determine if the ticket is archived
     *
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->status === Status::ARCHIVED;
    }

    /**
     * Determine if the ticket is open
     *
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->status === Status::OPEN;
    }

    public function isAnswered(): bool
    {
        return $this->status === Status::ANSWERED;
    }

    /**
     * Determine if the ticket is closed
     *
     * @return bool
     */
    public function isClosed(): bool
    {
        return ! $this->isOpen();
    }

    /**
     * Determine if the ticket is resolved
     *
     * @return bool
     */
    public function isResolved(): bool
    {
        return $this->is_resolved;
    }

    /**
     * Determine if the ticket is unresolved
     *
     * @return bool
     */
    public function isUnresolved(): bool
    {
        return ! $this->isResolved();
    }

    /**
     * Determine if the ticket is locked
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->is_locked;
    }

    /**
     * Determine if the ticket is unresolved
     *
     * @return bool
     */
    public function isUnlocked(): bool
    {
        return ! $this->isLocked();
    }

    /**
     * Mark the ticket as resolved
     *
     * @return self
     */
    public function markAsResolved(): self
    {
        $this->update([
            'is_resolved' => true,
        ]);

        return $this;
    }

    /**
     * Mark the ticket as locked
     *
     * @return self
     */
    public function markAsLocked(): self
    {
        $this->update([
            'is_locked' => true,
        ]);

        return $this;
    }

    /**
     * Mark the ticket as locked
     *
     * @return self
     */
    public function markAsUnlocked(): self
    {
        $this->update([
            'is_locked' => false,
        ]);

        return $this;
    }

    /**
     * Mark the ticket as archived
     *
     * @return self
     */
    public function markAsArchived(): self
    {
        $this->archive();

        return $this;
    }

    /**
     * Mark the ticket as answered
     */
    public function markAsAnswered(): self
    {
        $this->answer();

        return $this;
    }

    /**
     * Close the ticket and mark it as resolved
     *
     * @return self
     */
    public function closeAsResolved(): self
    {
        $this->update([
            'status' => Status::CLOSED,
            'is_resolved' => true,
        ]);

        return $this;
    }

    /**
     * Close the ticket and mark it as unresolved
     *
     * @return self
     */
    public function closeAsUnresolved(): self
    {
        $this->update([
            'status' => Status::CLOSED,
            'is_resolved' => false,
        ]);

        return $this;
    }

    /**
     * Reopen the ticket and mark it as resolved
     *
     * @return self
     */
    public function reopenAsUnresolved(): self
    {
        $this->update([
            'status' => Status::OPEN,
            'is_resolved' => false,
        ]);

        return $this;
    }
}
