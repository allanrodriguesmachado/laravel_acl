import {Request, response, Response} from 'express'
import {CreateUserService} from "../../services/user/CreateUserService";


class CreateUserController {
    async handleNewCreateUser(req: Request, res:Response) {
        const {name, email, password} = req.body;
        const createUserServices = new CreateUserService();
        const user = await createUserServices.execute({name, email, password});

        return res.json(user);
    }
}

export {CreateUserController}