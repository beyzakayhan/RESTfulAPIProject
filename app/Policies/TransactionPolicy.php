<?php

namespace App\Policies;

use App\Traits\AdminActions;
use App\Transaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;
    use AdminActions;

    /**
     * Determine whether the user can view the transaction.
     *
     * @return mixed
     */
    public function view(User $user, Transaction $transaction)
    {
        return $user->id === $transaction->buyer->id || $user->id === $transaction->product->seller->id;
    }
}
