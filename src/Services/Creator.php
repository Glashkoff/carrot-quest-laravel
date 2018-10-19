<?php namespace professionalweb\CarrotQuest\Services;

use professionalweb\CarrotQuest\Interfaces\ObjectCreator;

/**
 * Class creator
 * @package professionalweb\CarrotQuest\Services
 */
class Creator implements ObjectCreator
{

    /**
     * Create class
     *
     * @param string $class
     * @param array  $data
     *
     * @return mixed
     * @throws \Exception
     */
    public function create(string $class, array $data)
    {
        $obj = app($class);
        if ($obj === null) {
            throw new \Exception('Can\'t init class');
        }
        foreach ($data as $key => $val) {
            $camelCaseMethodName = 'set' . studly_case($key);
            $snakeCaseMethodName = 'set_' . snake_case($key);
            if (property_exists($obj, $key)) {
                $obj->$key = $val;
            } elseif (method_exists($obj, $camelCaseMethodName)) {
                $obj->$camelCaseMethodName($val);
            } elseIf (method_exists($obj, $snakeCaseMethodName)) {
                $obj->$snakeCaseMethodName($val);
            }
        }

        return $obj;
    }
}