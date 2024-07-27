import prismaClient from "../../prisma";
import {compare} from "bcryptjs";
import {sign} from "jsonwebtoken";

interface AuthRequest {
    email: string,
    password: string
}

class AuthUserServices {
    async execute({email, password}: AuthRequest) {
        const user = await prismaClient.user.findFirst({
            where: {
                email: email
            }
        })

        if (!user) {
            throw new Error("Email ou senha invalido");
        }

        if (!await compare(password, user.password)) {
            throw new Error("Email ou senha invalido")
        }

        const token = sign(
            {name: user.name, email: user.email},
            process.env.JWT_SECRET,
            {
                subject: user.id,
                expiresIn: '30d'
            }
        );

        return ({
            id: user.id,
            name: user.name,
            email: email,
            token: token
        })
    }
}

export {AuthUserServices};