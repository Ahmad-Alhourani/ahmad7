<?php namespace App\Events\Backend\Hello;

use Illuminate\Queue\SerializesModels;
/**
 * Class HelloDeleted.
 */

class HelloDeleted
{
    use SerializesModels;
    /**
     * @var
     */

    public $hello;

    /**
     * @param $hello
     */
    public function __construct($hello)
    {
        $this->hello = $hello;
    }
}
