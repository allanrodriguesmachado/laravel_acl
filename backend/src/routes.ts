import {Router} from 'express'
import {CreateUserController} from './controllers/user/CreateUserController';
import {AuthUserController} from "./controllers/user/AuthUserController";
const router = Router();

router.post('/users', new CreateUserController().handleNewCreateUser);
router.post('/session', new AuthUserController().handleAuthUserController);

export {router}