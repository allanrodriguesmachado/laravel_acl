import {Router} from 'express'
import {CreateUserController} from './controllers/user/CreateUserController';
import {AuthUserController} from "./controllers/user/AuthUserController";
import {DetailUserController} from "./controllers/user/DetailUserController";
import {isAuthenticated} from "./middlewares/isAuthenticated";

const router = Router();

router.post('/users', new CreateUserController().handleNewCreateUserController);
router.post('/session', new AuthUserController().handleAuthUserController);
router.get('/user', isAuthenticated, new DetailUserController().handleDetailUserController);

export {router}