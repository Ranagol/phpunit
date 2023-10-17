<?php

namespace forTestingAbstractClassesAndTraits;//TODO Andor check this out and learn

class Employee extends PersonAbstract {

    /**
     * This method comes from the abstract parent class.
     */
    public function getSalary()
    {
        return 50 * 100; // $ * h
    }
}
