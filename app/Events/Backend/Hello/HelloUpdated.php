<?php namespace App\Events\Backend\Hello;

use Illuminate\Queue\SerializesModels;
/**
 * Class HelloUpdated.
 */
class HelloUpdated
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
