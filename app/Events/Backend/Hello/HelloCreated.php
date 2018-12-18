<?php
namespace App\Events\Backend\Hello;

use Illuminate\Queue\SerializesModels;
/**
 * Class HelloCreated.
 */
class HelloCreated
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
