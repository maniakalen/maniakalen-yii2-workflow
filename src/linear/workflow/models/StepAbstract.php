<?php
/**
 * PHP Version 5.5
 *
 *  Linear workflow step abstract
 *
 * @category workflow\steps
 * @package  linear\workflow
 * @author   Peter Georgiev <peter.georgiev@concatel.com>
 * @license  GNU GENERAL PUBLIC LICENSE https://www.gnu.org/licenses/gpl.html
 * @link     -
 */

namespace linear\linear\workflow\models;

use linear\linear\workflow\exceptions\WorkflowException;
use linear\linear\workflow\interfaces\StepComponentInterface;
use linear\linear\workflow\interfaces\StepInterface;
use yii\base\Response;
use yii\db\ActiveRecord;
use yii\web\User;

/**
 * PHP Version 5.5
 *
 *  Linear workflow step abstract
 *
 * @category workflow\steps
 * @package  linear\workflow
 * @author   Peter Georgiev <peter.georgiev@concatel.com>
 * @license  GNU GENERAL PUBLIC LICENSE https://www.gnu.org/licenses/gpl.html
 * @link     -
 */
abstract class StepAbstract extends ActiveRecord implements StepInterface
{

    /**
     * Returns the next step of the workflow chain
     *
     * return StepInterface|null
     */
    public function getNextStep()
    {
        // TODO: Implement getNextStep() method.
    }

    /**
     * Returns the prev step of the workflow chain
     *
     * return StepInterface|null
     */
    public function getPrevStep()
    {
        // TODO: Implement getPrevStep() method.
    }

    /**
     * Retirns an array of defined step restrictions in order to be considered satisfied and can be passed on next one
     *
     * @return array
     */
    public function getRestrictions()
    {
        // TODO: Implement getRestrictions() method.
    }

    /**
     * Verifies the if the model current stats satisfies the step restrictions to be passed on next one
     *
     * @param StepComponentInterface $model the component model to be manipulated inside the step
     *
     * @return Response
     */
    public function satisfiesRestrictions(StepComponentInterface $model)
    {
        // TODO: Implement satisfiesRestrictions() method.
    }

    /**
     * Executes the given step
     *
     * @param StepComponentInterface $model the component model to be manipulated inside the step
     *
     * @return Response
     * @throws WorkflowException
     */
    public function run(StepComponentInterface $model)
    {
        throw new WorkflowException("Method run not yet implemented");
    }

    /**
     * Confirms if the provided user has permission to access given step
     *
     * @param User $user The user whose access should be verified
     *
     * @return bool
     */
    public function isAccessible(User $user)
    {
        return $user->can($this->getAccessPermission());
    }

    /**
     * Confirms if the provided user has permission to access given step
     *
     * @param User $user The user whose edit permissions should be verified
     *
     * @return bool
     */
    public function isEditable(User $user)
    {
        return $user->can($this->getAccessPermission());
    }

    /**
     * Retreives the access permission
     *
     * @return string
     */
    public function getAccessPermission()
    {
        return '';
    }
    /**
     * Retreives the edit permission
     *
     * @return string
     */
    public function getEditPermission()
    {
        return '';
    }

    /**
     * Retreives the full step status label translation
     *
     * @return string
     */
    public function getStepStatusLabel()
    {
        return '';
    }
}